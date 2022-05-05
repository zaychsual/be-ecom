<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\InvoiceController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\CustomerController;
use App\Http\Controllers\Api\Admin\DashboardController;

Route::post('/admin/register',[AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/login',[AuthController::class, 'login'])->name('admin.login');

Route::group( ['prefix' => 'admin','middleware' => ['auth:api_admin'], 'as' => 'admin.' ],function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cust', [CustomerController::class, 'index'])->name('cust');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/invoices', InvoiceController::class);
    Route::resource('/sliders', SliderController::class);
    Route::resource('/user-admin', UserController::class);
});

Route::group( ['prefix' => 'web', 'as' => 'web.' ],function(){
    Route::resource('/categories', App\Http\Controllers\Api\Web\CategoryController::class);
    Route::get('/sliders', [App\Http\Controllers\Api\Web\SliderController::class, 'index'])->name('sliders');
    Route::resource('/products', App\Http\Controllers\Api\Web\ProductController::class);

    Route::get('/rajaongkir/provinces', [App\Http\Controllers\Api\Web\RajaOngkirController::class, 'getProvinces']);
    Route::post('/rajaongkir/cities', [App\Http\Controllers\Api\Web\RajaOngkirController::class, 'getCities']);
    Route::post('/rajaongkir/checkOngkir', [App\Http\Controllers\Api\Web\RajaOngkirController::class, 'checkOngkir']);

});
