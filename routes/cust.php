<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::group( ['middleware' => ['auth:api_cust']],function(){
   // authenticated staff routes here
    // Route::get('dashboard',[LoginController::class, 'adminDashboard']);
});
