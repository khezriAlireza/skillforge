<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $cartItems = $cartQuantity->sum('quantity');

        return view('cart.index', compact( 'cartQuantity', 'categories', 'subCategories','cartItems'));
    }

    public function cart_modal()
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('cart.modal', compact( 'cartQuantity', 'categories', 'subCategories'));
    }


    public function addToCart($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'message2' => "لطفاً ابتدا وارد حساب کاربری خود شوید.",
            ], 401); // ارسال کد 401 برای عدم احراز هویت
        }

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message2' => "امکان افزودن محصول به سبد خرید وجود ندارد",
            ], 404);
        }

        $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return response()->json([
            'message' => "محصول به سبد خرید افزوده شد. برای مشاهده سبد خرید <a href='#' data-bs-toggle='modal' data-bs-target='#pageModal' data-bs-backdrop='true'>کلیک</a> کنید."
        ]);
    }


    // حذف محصول از سبد خرید
    public function removeItem(Request $request)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'محصول پیدا نشد.']);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'محصول حذف شد.',
            'cartTotal' => CartItem::where('user_id', Auth::id())->sum('quantity')
        ]);
    }

    // خالی کردن کل سبد خرید
    public function clearCart(Request $request)
    {
        CartItem::where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => true,
            'cartTotal' => 0
        ]);
    }


    public function updateQuantity(Request $request)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'محصول یافت نشد.']);
        }

        if ($request->action === "increase") {
            $cartItem->increment('quantity');
        } elseif ($request->action === "decrease" && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return response()->json([
            'success' => true,
            'newQuantity' => $cartItem->quantity,
            'cartTotal' => CartItem::where('user_id', Auth::id())->sum('quantity')
        ]);
    }
}


