<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(): RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->route('customer.login')
                ->with('error', __('messages.checkout_login_required'));
        }

        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', __('messages.checkout_cart_empty'));
        }

        foreach ($cartItems as $item) {
            if (! $item->product || ! $item->product->active) {
                return redirect()->route('cart.index')
                    ->with('error', __('messages.checkout_product_unavailable'));
            }

            if ($item->product->stock !== null && $item->product->stock < $item->quantity) {
                return redirect()->route('cart.index')
                    ->with('error', __('messages.checkout_insufficient_stock', ['name' => $item->product->name]));
            }
        }

        try {
            $order = DB::transaction(function () use ($cartItems) {
                $totalPrice = $cartItems->sum(function ($item) {
                    return $item->product->final_price * $item->quantity;
                });

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'status' => 'pending',
                    'total_price' => $totalPrice,
                ]);

                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->final_price,
                    ]);
                }

                return $order;
            });

            // Initialize Stripe Checkout Session
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $lineItems = [];
            foreach ($order->items()->with('product')->get() as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $item->product->name,
                            'description' => Str::limit($item->product->description, 100),
                        ],
                        'unit_amount' => (int)($item->price * 100), // convert to cents
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('payment.success', ['order' => $order->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel', ['order' => $order->id]),
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => Auth::id(),
                ],
            ]);

            return redirect()->away($session->url);

        } catch (\Exception $e) {
            logger()->error('Stripe checkout error: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', __('messages.payment_failed'));
        }
    }

    public function paymentSuccess(Request $request, Order $order): RedirectResponse
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('cart.index')
                ->with('error', __('messages.payment_failed'));
        }

        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if ($session->payment_status === 'paid' && $order->status === 'pending') {
                DB::transaction(function () use ($order) {
                    // Update order status
                    $order->update(['status' => 'completed']);

                    // Decrement stock for products
                    foreach ($order->items as $item) {
                        if ($item->product && $item->product->stock !== null) {
                            $item->product->decrement('stock', $item->quantity);
                        }
                    }

                    // Clear the cart
                    CartItem::where('user_id', $order->user_id)->delete();
                });

                return redirect()->route('customer.order.list')
                    ->with('message', __('messages.payment_success'));
            }

            if ($order->status === 'completed') {
                return redirect()->route('customer.order.list')
                    ->with('message', __('messages.payment_success'));
            }

            return redirect()->route('cart.index')
                ->with('error', __('messages.payment_failed'));

        } catch (\Exception $e) {
            logger()->error('Stripe success callback error: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', __('messages.payment_failed'));
        }
    }

    public function paymentCancel(Order $order): RedirectResponse
    {
        if ($order->status === 'pending') {
            $order->update(['status' => 'canceled']);
        }

        return redirect()->route('cart.index')
            ->with('error', __('messages.payment_canceled'));
    }
}
