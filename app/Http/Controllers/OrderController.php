<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(): RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->route('customer.login')
                ->with('error', 'لطفاً ابتدا وارد حساب کاربری خود شوید.');
        }

        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'سبد خرید شما خالی است.');
        }

        foreach ($cartItems as $item) {
            if (! $item->product || ! $item->product->active) {
                return redirect()->route('cart.index')
                    ->with('error', 'یکی از محصولات سبد خرید دیگر در دسترس نیست.');
            }

            if ($item->product->stock !== null && $item->product->stock < $item->quantity) {
                return redirect()->route('cart.index')
                    ->with('error', 'موجودی «'.$item->product->name.'» کافی نیست.');
            }
        }

        DB::transaction(function () use ($cartItems) {
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

                if ($item->product->stock !== null) {
                    $item->product->decrement('stock', $item->quantity);
                }
            }

            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('customer.order.list')
            ->with('message', 'سفارش شما با موفقیت ثبت شد و در انتظار بررسی است.');
    }
}
