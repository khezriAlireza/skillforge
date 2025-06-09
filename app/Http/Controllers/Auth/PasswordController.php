<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {

        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'min:8', 'different:current_password', 'confirmed'],
        ]);

        // Check if the current password matches the one in the database
        $user = Auth::user();
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'رمز عبور فعلی اشتباه است.'])->withInput();
        }

        // Check if the current password matches the confirmed password
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->withErrors(['confirmed'])->withInput();
        }


        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);
        session()->flash('status', 'کلمه عبور کاربر با موفقیت تغییر کرد');

        return redirect()->back();
    }
}
