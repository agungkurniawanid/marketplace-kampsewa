<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    // user
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/users/{identifier}', [UserController::class, 'getUserByIDOrName']);
    // product
    Route::get('/products', [ProductController::class, 'getAllProducts']);
    Route::get('/products/{userId}', [ProductController::class, 'getAllProductsByUserId']);
    Route::get('/product/{productId}', [ProductController::class, 'getProductById']);
});
