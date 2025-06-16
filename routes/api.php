<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'],function (){
    /////////////////////////////////////////////////// Auth /////////////////////////////////////////////////////
   Route::post('register',[AuthController::class,'register']);
   Route::post('login',[AuthController::class,'login']);
   /////////////////////////////////////////////////// Admin Panel ///////////////////////////////////////////////
    Route::get('customer/list',[UserController::class,'customer_list'])->middleware('auth:api');
});

