<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\LoginController::class, 'welcome'])
->name('welcome');
Route::post('/welcome-find', [App\Http\Controllers\LoginController::class, 'welcome'])
->name('welcome.find');

Route::get('/login-form', [App\Http\Controllers\LoginController::class, 'index'])
->name('login');

Route::post('/login-auth', [App\Http\Controllers\LoginController::class, 'auth'])
->name('login.auth');

Route::get('/register-form', [App\Http\Controllers\LoginController::class, 'register'])
->name('register.form');
Route::post('/register-store', [App\Http\Controllers\LoginController::class, 'store'])
->name('register.store');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
->name('logout');

//Auth::routes();

//Route::group(['middleware' => 'IsAdmin'],function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home-seller', [App\Http\Controllers\HomeController::class, 'seller'])->name('home.seller');

    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])
    ->name('category');
    Route::post('/category-store', [App\Http\Controllers\CategoryController::class, 'store'])
    ->name('category.store');
    Route::get('/category-delete', [App\Http\Controllers\CategoryController::class, 'delete'])
    ->name('category.delete');
    Route::post('/category-update', [App\Http\Controllers\CategoryController::class, 'update'])
    ->name('category.update');


    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user');

    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])
    ->name('product');
    Route::post('/product-store', [App\Http\Controllers\ProductController::class, 'store'])
    ->name('product.store');
    Route::get('/product-delete', [App\Http\Controllers\ProductController::class, 'delete'])
    ->name('product.delete');
    Route::post('/product-update', [App\Http\Controllers\ProductController::class, 'update'])
    ->name('product.update');

    Route::get('/addcart/{product_id}', [App\Http\Controllers\ProductController::class, 'addcart'])
    ->name('addcart');
    Route::get('/addcart-view', [App\Http\Controllers\ProductController::class, 'addcart_view'])
    ->name('addcart.view');
    Route::post('/addcart-update', [App\Http\Controllers\ProductController::class, 'addcart_update'])
    ->name('addcart.update');
    Route::get('/addcart-delete', [App\Http\Controllers\ProductController::class, 'addcart_delete'])
    ->name('addcart.delete');
    Route::get('/addcart-checkout', [App\Http\Controllers\ProductController::class, 'addcart_checkout'])
    ->name('addcart.checkout');

    Route::get('/order', [App\Http\Controllers\ProductController::class, 'order'])
    ->name('order');
    Route::get('/order-view', [App\Http\Controllers\ProductController::class, 'order_view'])
    ->name('order.view');

    Route::post('/payment-store', [App\Http\Controllers\ProductController::class, 'payment_store'])
    ->name('payment.store');
    Route::get('/payment-update', [App\Http\Controllers\ProductController::class, 'payment_update'])
    ->name('payment.update');

    Route::get('/invoice', [App\Http\Controllers\ProductController::class, 'invoice'])
    ->name('invoice');

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])
    ->name('profile');
    Route::post('/profile-update', [App\Http\Controllers\HomeController::class, 'profile_update'])
    ->name('profile.update');

//});
