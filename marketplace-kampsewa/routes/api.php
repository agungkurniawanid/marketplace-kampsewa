<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\LupaPassword;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// auth
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// lupa password api
Route::post('/lupa-password', [LupaPassword::class, 'verifikasiPhone']);
Route::post('/lupa-password/verifikasi-otp/{nomor_telephone}', [LupaPassword::class, 'verifikasiOTP']);
Route::post('/lupa-password/reset-password/{nomor_telephone}', [LupaPassword::class, 'resetPassword']);
Route::post('/lupa-password/kirim-ulang-otp/{nomor_telephone}', [LupaPassword::class, 'kirimUlangOTP']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    // user
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/users/{identifier}', [UserController::class, 'getUserByIDOrName']);
    Route::post('/logout', [LogoutController::class, 'logout']);

    // product
    Route::get('/products', [ProductController::class, 'getAllProducts']);
    Route::get('/products/{userId}', [ProductController::class, 'getAllProductsByUserId']);
    Route::get('/product/{productId}', [ProductController::class, 'getProductById']);
});
