<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role === 'admin'){
            return view('dashboard');
        }else{
            return redirect()->route('welcome');
        }
    }
    public function welcome()
    {
        $categories = Category::all();
        $products = Product::where('is_special',1)->get();
            $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
            $cartItems = $cartQuantity->sum('quantity');
        $blogs = Blog::where('favourite',1)->get();
        return view('welcome',compact('categories','products','cartItems','blogs'));
    }

    public function sub_categories(Category $category)
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $subCategories = SubCategory::where('category_id',$category->id)->with('products')->get();
        return view('subCategory.main',compact('subCategories','category','cartItems'));
    }

    public function products(SubCategory $subCategory)
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $products = Product::with('subCategory')
            ->where('category_id',$subCategory->category_id)->where('active',1)->get()
            ->map(function ($product) {
                $product->final_price = $product->final_price; // Call accessor
                return $product;
            });
        $subCategories = SubCategory::where('category_id',$subCategory->category_id)->get();

        return view('products.main',compact('subCategories','subCategory','products','cartItems'));
    }
}
