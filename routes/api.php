<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\LoginController;
use App\Http\Controllers\Api\Admin\RegisterController;

// Route::middleware('auth:api_admin')->get('/user', function(Request $request) {
//     return $request->user();
// });
Route::post('/admin/register',[RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/login',[LoginController::class, 'login'])->name('admin.login');
Route::group( ['prefix' => 'admin','middleware' => ['auth:api_admin','scopes:admin'] ],function(){
   // authenticated staff routes here
    // Route::get('dashboard',[LoginController::class, 'adminDashboard']);
});
// Route::post('/register', [RegisterController::class, 'register']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:api_admin');
