<?php

use App\Http\Controllers\Api\ChartWebController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\DashboardCustController;
use App\Http\Controllers\Customer\IklanController as CustomerIklanController;
use App\Http\Controllers\Customer\ProdukController;
use App\Http\Controllers\Developer\DashboardController;
use App\Http\Controllers\Developer\DetailPenggunaController;
use App\Http\Controllers\Developer\IklanController;
use App\Http\Controllers\Developer\InformasiPenggunaController;
use App\Http\Controllers\Developer\KelolaPenggunaMenuController;
use App\Http\Controllers\Developer\LupaPassword;
use App\Http\Controllers\Developer\NotificationController;
use App\Http\Controllers\Developer\PengeluaranController;
use App\Http\Controllers\Developer\PenghasilanController;
use App\Http\Controllers\Developer\Penyewaan;
use App\Http\Controllers\Developer\ProfileController;
use App\Http\Controllers\Developer\RekapKeuanganController;
use Illuminate\Support\Facades\Route;

// -- auth route
Route::get('/login', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
Route::get('/lupa-password', [LupaPassword::class, 'index'])->name('lupa-password');
Route::post('/lupa-password/send-otp', [LupaPassword::class, 'sendOTP'])->name('lupa-password.send-otp');
Route::get('/lupa-password/check-kode-otp/{nomor_telephone}', [LupaPassword::class, 'indexCheckOTP'])->name('lupa-password.kode-otp');
Route::post('/lupa-password/check-kode-otp/{nomor_telephone}', [LupaPassword::class, 'checkOTP'])->name('lupa-password.check-otp');
Route::post('/lupa-password/kirim-ulang/{nomor_telephone}', [LupaPassword::class, 'kirimUlang'])->name('lupa-password.kirim-ulang');
Route::get('/lupa-password/reset-password/{nomor_telephone}', [LupaPassword::class, 'indexResetPassword'])->name('lupa-password.reset-password');
Route::post('/lupa-password/reset-password/{nomor_telephone}', [LupaPassword::class, 'resetPassword'])->name('lupa-password.change-password');

/*
|--------------------------------------------------------------------------
| Developer Routes
*/

// -- dashboard menu route
Route::get('/developer/dashboard/home', [DashboardController::class, 'index'])->name('home.index')->middleware('auth');
Route::put('/mark-notification-as-read', [DashboardController::class, 'markNotificationAsRead'])->name('mark-notification-as-read');

// -- chart api web dev
Route::get('/chart-keuntungan-menu-dashboard', [ChartWebController::class, 'ApiTotalKeuntungan']);

// -- notification
Route::get('developer/dashboard/notification', [NotificationController::class, 'index'])->name('notification.index')->middleware('auth');

// -- kelola pengguna
Route::get('developer/dashboard/kelola-pengguna', [KelolaPenggunaMenuController::class, 'index'])->name('kelola-pengguna.index')->middleware('auth');
Route::get('developer/dashboard/kelola-pengguna/detail-pengguna/{fullname}', [DetailPenggunaController::class, 'index'])->name('detail-pengguna.index')->middleware('auth');
Route::get('developer/dashboard/kelola-pengguna/detail-pengguna/{fullname}/produk-disewakan', [DetailPenggunaController::class, 'showProdukDisewakan'])->name('detail-pengguna.produk-disewakan')->middleware('auth');
Route::get('developer/dashboard/kelola-pengguna/detail-pengguna/{fullname}/produk-disewakan/detail-produk/{namaproduk}', [DetailPenggunaController::class, 'showDetailProdukDisewakan'])->name('detail-pengguna.detail-produk-disewakan')->middleware('auth');
Route::get('developer/dashboard/kelola-pengguna/detail-pengguna/{fullname}/detail-produk-sedang-disewa/{namaproduk}', [DetailPenggunaController::class, 'showDetailProdukSedangDisewa'])->name('detail-pengguna.detail-produk-sedang-disewa')->middleware('auth');
Route::post('/delete-selected-products', [DetailPenggunaController::class, 'deleteSelectedProducts'])->name('delete_selected_products')->middleware('auth');

Route::get('developer/dashboard/informasi-pengguna', [InformasiPenggunaController::class, 'index'])->name('informasi-pengguna.index')->middleware('auth');
Route::get('developer/dashboard/iklan', [IklanController::class, 'index'])->name('iklan.index')->middleware('auth');
Route::get('developer/dashboard/penyewaan', [Penyewaan::class, 'index'])->name('penyewaan.index')->middleware('auth');
Route::get('developer/dashboard/penghasilan', [PenghasilanController::class, 'index'])->name('penghasilan.index')->middleware('auth');
Route::get('developer/dashboard/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index')->middleware('auth');
Route::get('developer/dashboard/rekap-keuangan', [RekapKeuanganController::class, 'index'])->name('rekap-keuangan.index')->middleware('auth');
Route::get('developer/dashboard/profile/{nama_lengkap}', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');


// -- customer route
Route::get('/customer/dashboard/home', [DashboardCustController::class, 'index'])->middleware('auth');
Route::get('/customer/dashboard/menu-produk', [ProdukController::class, 'index'])->name('menu-produk.index')->middleware('auth');
Route::get('/customer/dashboard/kelola-produk', [ProdukController::class, 'kelolaProduk'])->name('menu-produk.kelola-produk')->middleware('auth');
Route::get('/customer/dashboard/sedang-disewa', [ProdukController::class, 'sedangDisewa'])->name('menu-produk.sedang-disewa')->middleware('auth');
Route::get('/customer/dashboard/buat-iklan', [CustomerIklanController::class, 'index'])->name('buat-iklan.index')->middleware('auth');
