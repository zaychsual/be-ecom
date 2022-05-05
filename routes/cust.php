<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Cust\CartController;
use App\Http\Controllers\Api\Cust\AuthController;
use App\Http\Controllers\Api\Cust\ReviewController;
use App\Http\Controllers\Api\Cust\CheckoutController;
use App\Http\Controllers\Api\Cust\InvoiceController;
use App\Http\Controllers\Api\Cust\DashboardController;
use App\Http\Controllers\Api\Cust\NotificationHandlerController;

Route::post('/cust/register',[AuthController::class, 'register'])->name('register');
Route::post('/cust/login',[AuthController::class, 'login'])->name('login');

Route::group( ['prefix' => 'cust','middleware' => ['auth:api_cust'], 'as' => 'cust.' ],function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/invoices', InvoiceController::class);
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews');

    //get cart 
    Route::get('/carts', [CartController::class, 'index']);
    //store cart
    Route::post('/carts', [CartController::class, 'store']);
    //get cart price
    Route::get('/carts/total_price', [CartController::class, 'getCartPrice']);
    //get cart weight
    Route::get('/carts/total_weight', [CartController::class, 'getCartWeight']);
    //remove cart
    Route::post('/carts/remove', [CartController::class, 'removeCart']);
    //checkout
    Route::post('/checkout', [CheckoutController::class, 'store']);

    Route::post('/notification', [NotificationHandlerController::class, 'index']);

});

    
