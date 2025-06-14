<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminInventroyManagementController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderManageController;

Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/login', [AdminLoginController::class, 'postLogin'])->name('admin.postLogin');


Route::group(['middleware' => ['adminAuth'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');

     Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/create', [AdminProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminProductController::class, 'delete'])->name('delete');
    });
     Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [AdminOrderManageController::class, 'index'])->name('index');
        Route::get('/view/{id}', [AdminOrderManageController::class, 'view'])->name('view');
        
    });

});

