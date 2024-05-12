<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/users/{id_user}', [UserController::class, 'getUserById']);
});
