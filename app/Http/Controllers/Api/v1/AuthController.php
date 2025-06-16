<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required | lowercase | string | max:40 | unique:users,user_name',
            'password' => 'confirmed | required | ',Password::defaults(),
            'name' => 'required | string',
            'phone' => 'nullable | regex:/^09\d{9}$/'
        ]);
        $user = User::create($request->only('user_name','password','name','phone'));
        $token = $user->createToken('authToken')->accessToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'User Has Created'
        ],Response::HTTP_OK);

    }



//    public function register(Request $request)
//    {
//        $data = $request->all();
//        $validateData = Validator::make($data,[
//            'name' => ['required', 'string', 'max:255'],
//            'user_name' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Password::default()],
//            'phone' => ['regex:/^09\d{9}$/']
//        ]);
//        if ($validateData->fails()){
//            return response()->json([
//                'error' => $validateData->messages(),
//                'success' => 'false'
//            ],Response::HTTP_UNPROCESSABLE_ENTITY);
//        }
//
//        $data['password'] = bcrypt($request['password']);
//        $user = User::create($data);
//        $token = $user->createToken('authToken')->accessToken;
//        return response()->json([
//            'user' => $user,
//            'token' => $token,
//            'success' => 'True'
//        ],Response::HTTP_CREATED);
//
//    }

    public function login(Request $request)
    {
        $credentials = $request->only('user_name', 'password');
        $validator = Validator::make($credentials,[
            'user_name' => 'required',
            'password' => 'required | min:8'
        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => $validator->messages(),
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (! auth()->attempt(['user_name' => $request->user_name, 'password' => $request->password])){
            return response()->jason([
                'message' => 'Invalid Credentials',
                ],Response::HTTP_UNAUTHORIZED);
        }
        $user = auth()->user();
        $token = $user->createToken('authToken')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'You Have Logged In'
        ],Response::HTTP_OK);
    }
}



