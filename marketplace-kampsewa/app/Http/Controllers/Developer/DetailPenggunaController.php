<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailPenggunaController extends Controller
{
    public function __construct() {
        $this->middleware('dev');
    }
    public function index($namalengkap) {
        $name = $namalengkap;
        return view('developers.detail-pengguna', ['title' => 'Detail Pengguna', 'name' => $name]);
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
