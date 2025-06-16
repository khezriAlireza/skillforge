<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function customer_list()
    {
        $user = auth()->user();
        $customers = User::where('role', 'customer')->get();
        if (!$user || $user->role !== 'admin' ){
            return response()->json([
                'message' => 'You are not authorized to access this resource.'
            ],Response::HTTP_UNAUTHORIZED);
        }else{
            return response()->json(UserResource::collection($customers), Response::HTTP_OK);
        }

    }

}
