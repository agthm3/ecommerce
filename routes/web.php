<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
Route::get('/product', [ProductController::class, 'index'])->name('index_product');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('show_product');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('edit_product');
Route::patch('/product/{product}/update', [ProductController::class, 'update'])->name('update_product');
Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('delete_product');

//Cart 
Route::middleware(['auth'])->group(function () {
 Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
 Route::get('/cart', [CartController::class, 'show'])->name('show_cart');
 Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('update_cart');
 Route::delete('/cart/{cart}/delete', [CartController::class, 'destroy'])->name('delete_cart');
 Route::get('/order', [OrderController::class, 'show'])->name('index_order');
 Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');


 Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
 Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');

 Route::middleware(['admin'])->group(function(){

    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    Route::post('/order/{order}/confimr', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
 });
});
