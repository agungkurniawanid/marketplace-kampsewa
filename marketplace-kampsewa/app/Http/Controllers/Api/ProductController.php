<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // fungsi untuk menampilkan 2 produk rating tertinggi
    // di halaman pertama dashboard mobile
    public function duaProdukRatingTertinggi(){
        // ambil data produk
        $produk = Produk::leftJoin('rating_produk', 'produk.id' , '=', 'rating_produk.id_produk')
        ->leftJoin('users', 'users.id' , '=', 'produk.id_user')
        ->select('produk.*', 'rating_produk.rating', 'users.name', 'users.name_store')
        ->orderByDesc('rating_produk.rating')->limit(2)->get();

        // check apakah data ada
        if(!$produk){
            // jika tidak ada maka response 404
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        // jika data ada maka respnose 200
        return response()->json([
            'message' => 'success',
            'data_produk' => $produk
        ], 200);
    }

    // fungsi untuk menampilkan product berdasarkan
    // kategori: tenda, pakaian, tas & sepatu, perlengkapan,
    // berdasarkan: semua, rating, termurah, termahal,
}
