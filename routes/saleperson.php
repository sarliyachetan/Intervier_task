<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Role\Saleperson\DashboardController;
use App\Http\Controllers\Role\Saleperson\LoginController;
use App\Http\Controllers\Role\Saleperson\ProductController;
use App\Http\Controllers\Role\Saleperson\CartController;
use App\Http\Controllers\Role\Saleperson\OrderController;


Route::get('/login', [LoginController::class, 'login'])->name('saleperson.login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('saleperson.postLogin');


Route::group(['middleware' => ['salepersonAuth'], 'as' => 'saleperson.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
  
    });
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
         Route::post('/add-to-cart', [CartController::class, 'store'])->name('add-to-cart');
         Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
         Route::post('/cart-update', [CartController::class, 'update'])->name('cart-update');
         Route::post('/cart-remove', [CartController::class, 'remove'])->name('cart-remove');

    });
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
         Route::any('/order-now', [OrderController::class, 'ordernow'])->name('order-now');
         Route::get('order-pdf', [OrderController::class, 'exportPdf'])->name('order-pdf');
         Route::get('single-order', [OrderController::class, 'singleOrderShow'])->name('single-order');
         Route::get('order-view/{id}', [OrderController::class, 'view'])->name('order-view');

    });


});

