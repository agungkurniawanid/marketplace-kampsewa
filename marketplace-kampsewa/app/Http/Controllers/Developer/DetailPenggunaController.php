<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailPenggunaController extends Controller
{
    public function __construct() {
        $this->middleware('dev');
    }
    public function index($namalengkap) {
        $name = $namalengkap;
          // ambil user berdasarkan yang baru saja terdaftar
          $user_baru_terdaftar = User::select('users.*')
          ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
          ->where('users.type', 0)
          ->whereDate('users.created_at', Carbon::today())
          ->where('status_notifikasi_user.status', 'unread')
          ->orderByDesc('users.created_at')->limit(10)
          ->get();
        return view('developers.detail-pengguna', ['title' => 'Detail Pengguna', 'name' => $name, 'user_baru_terdaftar' => $user_baru_terdaftar]);
    }
    public function showProdukDisewakan($namalengkap) {
        return view('developers.detailpengguna-produkdisewakan', ['title' => 'Produk Disewakan', 'name' => $namalengkap]);
    }
    public function showDetailProdukDisewakan($namalengkap, $nama_produk) {
        return view('developers.detail-produk-disewakan', ['title' => 'Detail Produk Disewakan', 'name' => $namalengkap]);
    }
    public function showDetailProdukSedangDisewa($namalengkap, $nama_produk) {
        return view('developers.detail-barang-sedangdisewa', ['title' => 'Detail Produk Sedang Disewa', 'name' => $namalengkap, 'nama_produk' => $nama_produk]);
    }
}
