<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
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
            session()->flash('error', __('messages.username_taken'));
            return redirect()->back();
        }
        $user->update([
            'user_name' => $request->input('username'),
            'name' => $request->input('name'),
            'p_num' => $request->input('p_num'),
        ]);
        session()->flash('status', __('messages.profile_updated'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'p_num' => ['nullable', 'regex:/^09\d{9}$/', 'unique:users,p_num,'.$request->user()->id],
        ]);

        $user = $request->user();

        $user->update([
            'name' => $request->input('name'),
            'p_num' => $request->input('p_num'),
        ]);
        session()->flash('message', __('messages.customer_profile_updated'));
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
                'current_password' => __('messages.current_password_wrong'),
            ])->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('message', __('messages.customer_password_changed'));
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
        if (auth()->user()->role !== 'admin') {
            abort(403, __('messages.orders_view_forbidden'));

        }
        $orders = Order::orderBy('id', 'desc')->with('items.product')->paginate(6);
        return view('users.customer.orderAdminPanel',['orders'=>$orders]);
    }
}
