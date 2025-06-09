<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
///////////////////////////////////////////////////// Main  ////////////////////////////////////////////////////////////
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/SubCategory/{category}', [HomeController::class, 'sub_categories'])->name('subCategories');
Route::get('/products/{subCategory}', [HomeController::class, 'products'])->name('products.main');
Route::get('/products/1', [HomeController::class, 'products'])->name('products.main1');
/////////////////////////////////////////////////   Cart      //////////////////////////////////////////////////////////

Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware('auth','verified')->name('dashboard');

Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-modal', [CartController::class, 'cart_modal'])->name('cart.modal');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

/////////////////////////////////////////////////   Profile      //////////////////////////////////////////////////////////

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('customer/profile',[ProfileController::class,'customer_profile'])->name('customer.profile');
    Route::post('customer/profile/update',[ProfileController::class,'customer_profile_update'])
        ->name('customer.profile.update');
    Route::post('customer/password/update',[ProfileController::class,'customer_password_update'])
        ->name('customer.password.update');

    Route::get('customer/order/list',[ProfileController::class,'customer_order_list'])->name('customer.order.list');

    Route::get('order/list',[ProfileController::class,'order_lists'])->middleware(['auth', 'verified'])
        ->name('order.lists');

});

///////////////////////////////////////////////////// Users ////////////////////////////////////////////////////////////

Route::get('/list/customer', [UserController::class, 'customer_list'])
        ->middleware(['auth', 'verified'])->name('customer.list');

Route::get('/list/admins', [UserController::class, 'admin_list'])
    ->middleware(['auth', 'verified'])->name('admin.list');

///////////////////////////////////////////////// Categories ///////////////////////////////////////////////////////////

Route::get('/category/create', [CategoryController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/show/{category}', [CategoryController::class, 'edit'])
    ->middleware(['auth', 'verified'])->name('category.edit');

Route::post('/category/store/{category}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])
    ->name('category.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])
    ->name('category.destroy');

/////////////////////////////////////////////// Sub Categories /////////////////////////////////////////////////////////

Route::get('/subCategory/create', [SubCategoryController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('subCategory.create');

Route::post('/subCategory/store',[SubCategoryController::class, 'store'])->middleware(['auth','verified'])
    ->name('subCategory.store');

Route::post('/subCategory/update',[SubCategoryController::class, 'update'])
    ->middleware('auth','verified')->name('subCategory.update');
Route::delete('/subCategory/destroy/{subCategory}',[SubCategoryController::class, 'destroy'])
    ->middleware('auth','verified')->name('subCategory.destroy');
//////////////////////////////////////////////// Products /////////////////////////////////////////////////////////
Route::get('/product/create',[ProductController::class, 'create'])->middleware('auth','verified')
    ->name('product.create');

Route::get('/get-subcategories/{category}', [ProductController::class, 'getSubcategories'])
    ->middleware('auth','verified')->name('get.subCategory');

Route::post('/product/store',[ProductController::class, 'store'])->middleware('auth', 'verified')
    ->name('product.store');

Route::get('/product',[ProductController::class, 'index'])->middleware('auth','verified')
    ->name('product.index');

Route::get('/product/edit/{product}',[ProductController::class, 'edit'])->middleware('auth','verified')
    ->name('product.edit');

Route::post('product/update/{product}',[ProductController::class, 'update'])->middleware('auth','verified')
    ->name('product.update');
Route::delete('product/delete/{product}',[ProductController::class, 'destroy'])->middleware('auth','verified')
    ->name('product.destroy');

///////////////////////////////////////////////////// Blog  ////////////////////////////////////////////////////////////

Route::get('/blog',[BlogController::class, 'index'])->middleware('verified','auth')->name('blog.index');
Route::get('blog/create',[BlogController::class, 'create'])->middleware('verified','auth')
    ->name('blog.create');
Route::post('blog/store',[BlogController::class, 'store'])->middleware('verified','auth')
    ->name('blog.store');
Route::get('/blog/edit/{post}',[BlogController::class, 'edit'])->middleware('auth','verified')
    ->name('post.edit');
Route::post('/blog/store/{post}',[BlogController::class,'update'])->middleware('verified','auth')
    ->name('post.update');
Route::delete('/blog/destroy/{post}',[BlogController::class, 'destroy'])
    ->middleware('auth','verified')->name('post.destroy');
Route::post('/blog/favourite/',[BlogController::class,'favourite'])->middleware('verified','auth')
    ->name('post.favourite');
Route::get('/blog/show/{post}',[BlogController::class,'show'])->name('post.show');
Route::get('/blog/list',[BlogController::class,'list'])->name('post.list');
///////////////////////////////////////////////// Auth /////////////////////////////////////////////////////////////////
require __DIR__.'/auth.php';
