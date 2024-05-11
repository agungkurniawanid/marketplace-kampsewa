<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\DevController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dev', [DevController::class, 'index'])->middleware('auth');
Route::get('/cust', [CustController::class, 'index'])->middleware('auth');
