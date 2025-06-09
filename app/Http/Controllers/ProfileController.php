<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Policies\OrderPolicy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function edit()
    {
        $user = Auth::user();
        if ($user->role == 'admin'){
            $users = User::all();
            return view('users.adminPanel.auth.profile',['users'=>$users]);

        }
        return redirect()->route('welcome');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        if ( User::where('user_name', $request->username)->exists() && $user->user_name != $request->username) {
            session()->flash('error', 'نام کاربری انتخابی توسط کاربر دیگری انتخاب شده است.');
            return redirect()->back();
        }
        $user->update([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'p_num' => $request->input('p_num'),
        ]);
        session()->flash('status', 'اطلاعات کاربر با موفقیت تغییر کرد');
        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function customer_profile()
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $user = Auth::user();
        return view('users.customer.profile',compact('cartItems','user'));
    }

    public function customer_profile_update(Request $request)
    {
        $user = $request->user();

        $user->update([
            'name' => $request->input('name'),
            'p_num' => $request->input('p_num'),
        ]);
        session()->flash('message','اطلاعات کاربر با موفقیت ویرایش شد.');
        return redirect()->back();
    }


    public function customer_password_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'min:8', 'different:current_password', 'confirmed'],
        ]);

        $user = Auth::user();

        // Custom validation for current password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors([
                'current_password' => 'رمز عبور فعلی اشتباه است.',
            ])->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('message', 'کلمه عبور با موفقیت تغییر کرد.');
    }

    public function customer_order_list()
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $user = Auth::user();
        $orders = Order::with('items.product')
        ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('users.customer.order_list',compact('cartItems','user','orders'));
    }

    public function order_lists()
    {
        if (!auth()->user()->role === 'admin'){
            abort(403,'شما اجازه ایجاد زیردسته را ندارید.');

        }
        $orders = Order::orderBy('id', 'desc')->with('items.product')->paginate(6);
        return view('users.customer.orderAdminPanel',['orders'=>$orders]);
    }
}
