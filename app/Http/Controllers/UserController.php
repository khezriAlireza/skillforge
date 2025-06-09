<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function customer_list()
    {
        $user = Auth::user();

        if ($user->role == 'admin'){
            $users = User::where('role','customer')->get();
            return view('users.adminPanel.customerList',['users'=>$users]);
        }

        return redirect()->route('welcome');
    }
    public function admin_list()
    {
        $user = Auth::user();

        if ($user->role == 'admin'){
            $users = User::where('role','admin')->get();
            return view('users.adminPanel.adminList',['users'=>$users]);
        }

        return redirect()->route('welcome');
    }
}
