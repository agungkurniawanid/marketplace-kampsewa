<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('dev');
    }
    public function index($namalengkap)
    {
        $name = $namalengkap;

        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')->limit(10)
            ->get();

        // get data user
        $data = DB::table('produk')
            ->rightJoin('users', 'produk.id_user', '=', 'users.id')
            ->whereIn('users.type', [0]) // Filter user dengan type 0 (Customer)
            ->select(
                'users.id as user_id',
                'users.name',
                'users.nomor_telephone',
                'users.created_at',
                'users.jenis_kelamin',
                'users.foto',
                'users.tanggal_lahir',
                DB::raw('COUNT(produk.id) as total_product')
            )->where('users.name', $name)
            ->groupBy('users.id', 'users.name', 'users.nomor_telephone', 'users.created_at', 'users.jenis_kelamin', 'users.foto', 'users.tanggal_lahir')
            ->first();

        $produk_disewakan_limit2 = Produk::leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->leftJoin('users', 'users.id', '=', 'produk.id_user')
            ->select(
                'produk.nama',
                'produk.status',
                'produk.foto_depan',
                DB::raw('SUM(detail_variant_produk.stok) as stok_produk')
            )
            ->where('users.name', $namalengkap)
            ->groupBy('produk.id', 'produk.nama', 'produk.status', 'produk.foto_depan')
            ->limit(2)
            ->get();


        return view('developers.detail-pengguna')->with([
            'title' => 'Detail Pengguna',
            'name' => $name,
            'user_baru_terdaftar' => $user_baru_terdaftar,
            'data' => $data,
            'produk_disewakan_limit2' => $produk_disewakan_limit2,
        ]);
    }
    public function showProdukDisewakan($namalengkap, Request $request)
    {
        // Fetching new registered users with unread notifications
        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')
            ->limit(10)
            ->get();

        // Mengambil data pengguna berdasarkan nama lengkap
    $user = User::where('name', $namalengkap)->first();

    // Jika pengguna tidak ditemukan, kembalikan respon error atau alihkan ke halaman lain
    if (!$user) {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
    }

    $id_user = $user->id;

    // Mengambil kategori produk
    $get_kategori = Produk::select('kategori')
        ->distinct()
        ->pluck('kategori')
        ->toArray();

    // Menerapkan filter dan pencarian
    $filter_category = $request->input('filter_category', 'Semua Barang');
    $cari_barang = $request->input('cari_barang', '');

    $get_data_produk = Produk::leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
        ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
        ->select(
            'produk.id as id_produk',
            'produk.nama',
            'produk.foto_depan as foto',
            'produk.deskripsi',
            DB::raw('MIN(detail_variant_produk.harga_sewa) as harga_sewa_terkecil')
        )
        ->where('produk.id_user', $id_user)
        ->when($filter_category != 'Semua Barang', function ($query) use ($filter_category) {
            return $query->where('produk.kategori', $filter_category);
        })
        ->when($cari_barang, function ($query) use ($cari_barang) {
            return $query->where('produk.nama', 'like', "%{$cari_barang}%");
        })
        ->groupBy('produk.id', 'produk.nama', 'produk.foto_depan', 'produk.deskripsi')
        ->get();

    // Mengembalikan view dengan data yang diperlukan
    return view('developers.detailpengguna-produkdisewakan')->with([
        'name' => $namalengkap,
        'title' => 'Produk Disewakan',
        'user_baru_terdaftar' => $user_baru_terdaftar,
        'get_kategori' => $get_kategori,
        'get_data_produk' => $get_data_produk,
        'filter_category' => $filter_category,
        'cari_barang' => $cari_barang,
    ]);
    }
    public function showDetailProdukDisewakan($namalengkap, $nama_produk)
    {
        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')->limit(10)
            ->get();

        return view('developers.detail-produk-disewakan', ['title' => 'Detail Produk Disewakan', 'name' => $namalengkap, 'user_baru_terdaftar' => $user_baru_terdaftar, 'nama_produk' => $nama_produk]);
    }
    public function showDetailProdukSedangDisewa($namalengkap, $nama_produk)
    {

        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')->limit(10)
            ->get();

        return view('developers.detail-barang-sedangdisewa', ['title' => 'Detail Produk Sedang Disewa', 'name' => $namalengkap, 'nama_produk' => $nama_produk, 'user_baru_terdaftar' => $user_baru_terdaftar]);
    }

    public function deleteSelectedProducts(Request $request)
    {
        $ids = $request->input('ids');
        Produk::whereIn('id', $ids)->delete();

        return back()->with('success', 'Produk terpilih telah dihapus.');
    }
}
