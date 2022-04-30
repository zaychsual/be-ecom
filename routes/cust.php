<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;

// Route::middleware('auth:api_admin')->get('/user', function(Request $request) {
//     return $request->user();
// });
Route::post('/register',[RegisterController::class, 'register'])->name('register');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::group( ['middleware' => ['auth:api_cust','scopes:cust'] ],function(){
   // authenticated staff routes here
    // Route::get('dashboard',[LoginController::class, 'adminDashboard']);
});
// Route::post('/register', [RegisterController::class, 'register']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:api_admin');
