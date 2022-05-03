<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\DashboardController;

Route::post('/admin/register',[AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/login',[AuthController::class, 'login'])->name('admin.login');

Route::group( ['prefix' => 'admin','middleware' => ['auth:api_admin'], 'as' => 'admin' ],function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
});
