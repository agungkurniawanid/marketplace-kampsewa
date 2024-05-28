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
    public function produkRatingTertinggi()
    {
        // ambil data produk
        $produk = Produk::leftJoin('rating_produk', 'produk.id', '=', 'rating_produk.id_produk')
            ->leftJoin('users', 'users.id', '=', 'produk.id_user')
            ->leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->select(
                'produk.id as id_produk',
                'produk.id_user as id_user',
                'rating_produk.id as id_rating_produk',
                'variant_produk.id as id_variant_produk',
                'detail_variant_produk.id as id_detail_variant_produk',
                'produk.nama as nama_produk',
                'produk.foto_depan',
                'rating_produk.rating',
                'detail_variant_produk.harga_sewa',
            )
            ->whereNotNull('rating_produk.rating')
            ->whereNotNull('detail_variant_produk.harga_sewa')
            ->orderByDesc('rating_produk.rating')
            ->orderBy('detail_variant_produk.harga_sewa')->get();

        // check apakah data ada
        if (!$produk) {
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
    // kategori: tenda, pakaian, tas & sepatu, perlengkapan, semua
    // berdasarkan: rating, termurah, termahal, terdekat
    public function getProdukByFilter($kategori = 'semua')
    {
        $filter = request()->query('filter', 'semua');
        $search = request()->query('search', null);
        $hargaMin = request()->query('hargaMin', null);
        $hargaMax = request()->query('hargaMax', null);

        // Ambil data dengan join table produk, users, variant_produk, detail_variant_produk, rating_produk
        $produk = Produk::leftJoin('users', 'users.id', '=', 'produk.id_user')
            ->leftJoin('rating_produk', 'produk.id', '=', 'rating_produk.id_produk')
            ->leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->select(
                'produk.id as id_produk',
                'produk.id_user as id_user',
                'rating_produk.id as id_rating_produk',
                'variant_produk.id as id_variant_produk',
                'detail_variant_produk.id as id_detail_variant_produk',
                'produk.nama as nama_produk',
                'produk.foto_depan',
                'rating_produk.rating',
                'detail_variant_produk.harga_sewa'
            )
            ->whereNotNull('rating_produk.rating')
            ->whereNotNull('detail_variant_produk.harga_sewa');

        // Filter kategori jika bukan 'semua'
        if ($kategori !== 'semua') {
            $produk->where('produk.kategori', 'like', '%' . $kategori . '%');
        }

        // Pencarian berdasarkan nama atau deskripsi produk
        if ($search) {
            $produk->where(function ($query) use ($search) {
                $query->where('produk.nama', 'like', '%' . $search . '%')
                    ->orWhere('produk.deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan harga minimal dan maksimal
        if ($hargaMin !== null) {
            $produk->where('detail_variant_produk.harga_sewa', '>=', $hargaMin);
        }

        if ($hargaMax !== null) {
            $produk->where('detail_variant_produk.harga_sewa', '<=', $hargaMax);
        }

        // Filter berdasarkan metode urutan
        switch ($filter) {
            case 'rating':
                $produk->orderBy('rating_produk.rating', 'desc');
                break;
            case 'termurah':
                $produk->orderBy('detail_variant_produk.harga_sewa', 'asc');
                break;
            case 'termahal':
                $produk->orderBy('detail_variant_produk.harga_sewa', 'desc');
                break;
            case 'semua':
            default:
                break;
        }

        // Eksekusi query dan ambil hasil
        $data = $produk->get();

        return response()->json([
            'message' => 'success',
            'data' => $data,
        ], 200);
    }

    // fungsi untuk menampilkan detial : nama, stok, harga, warna, ukuran
    // saat user clik icon keranjang produk, $parameter berdasarkan id/nama produk
    public function getDetailProdukKeranjang($parameter)
    {
        $warna = request()->query('warna');
        $ukuran = request()->query('ukuran');

        $tb_produk = Produk::leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->select(
                'produk.id as id_produk',
                'produk.nama as nama_produk',
                'variant_produk.id as id_variant_produk',
                'variant_produk.warna',
                'detail_variant_produk.id as id_detail_variant_produk',
                'detail_variant_produk.ukuran',
                'detail_variant_produk.stok',
                'detail_variant_produk.harga_sewa'
            )
            ->where(function ($query) use ($parameter) {
                $query->where('produk.nama', $parameter)
                    ->orWhere('produk.id', $parameter);
            });

        if ($warna) {
            $tb_produk->where('variant_produk.warna', 'like', '%' . $warna . '%');
        }

        if ($ukuran) {
            $tb_produk->where('detail_variant_produk.ukuran', 'like', $ukuran);
        }

        $result = $tb_produk->get();

        if ($result->isEmpty()) {
            return response()->json([
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data_produk' => $result,
        ], 200);
    }
}
