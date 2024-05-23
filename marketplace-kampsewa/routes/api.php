<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\LupaPassword;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ChartWebController;
use App\Http\Controllers\Api\IklanControlller;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// auth
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// -- chart api web dev
Route::get('/chart-keuntungan-menu-dashboard', [ChartWebController::class, 'ApiTotalKeuntungan']);
Route::get('/chart-penghasilan-menu-penghasilan', [ChartWebController::class, 'apiChartMenuPenghasilan']);
Route::get('/chart-penghasilan-perbulan-menu-penghasilan', [ChartWebController::class, 'apiChartTotalPenghasilanPerbulanSaatIniMenuPenghasilan']);

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
    Route::get('/product/kategori/{category}', [ProductController::class, 'getProductByCategory']);
    Route::get('/product/kategori-rating/rating-tertinggi-limit', [ProductController::class, 'getProductByRatingLimitTwo']);

    // iklan
    Route::get('/iklan', [IklanControlller::class, 'getAllIklan']);
    Route::get('/iklan/{identifier}', [IklanControlller::class, 'getDetailIklan']);
});
