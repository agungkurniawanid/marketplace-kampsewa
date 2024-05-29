<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DetailVariantProduk;
use App\Models\Produk;
use App\Models\VariantProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function __construct() {
        $this->middleware('cust');
    }
    public function index() {
        return view('customers.menu-produk.produk', ['title' => 'Produk Menu | KampSewa']);
    }
    public function kelolaProduk() {
        return view('customers.menu-produk.kelola-produk', ['title' => 'Kelola Produk | KampSewa']);
    }
    public function sedangDisewa() {
        return view('customers.menu-produk.sedang-disewa', ['title' => 'Sedang Disewa | KampSewa']);
    }
    public function tambahProduk($id_user) {
        $id_user_dec = Crypt::decrypt($id_user);
        return view('customers.menu-produk.tambah-produk')->with([
            'title' => 'Tambah Produk',
            'id' => $id_user_dec,
        ]);
    }
    public function tambahProdukPost(Request $request) {
        // Validasi data jika diperlukan
        $request->validate([
            'id_user' => 'required|string',
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:1000',
            'kategori_produk' => 'required|string',
            'foto_depan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_belakang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kiri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kanan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $request->merge([
            'status' => 'Tersedia',
        ]);

        // Simpan gambar-gambar
        $fotoDepanPath = $request->file('foto_depan')->store('assets/image/customers/produk');
        $fotoBelakangPath = $request->file('foto_belakang')->store('asset/images/customers/produk');
        $fotoKiriPath = $request->file('foto_kiri')->store('assets/image/customers/produk');
        $fotoKananPath = $request->file('foto_kanan')->store('assets/image/customers/produk');

        // Simpan data produk
        $produk = new Produk();
        $produk->id_user = $request->input('id_user');
        $produk->nama = $request->input('nama_produk');
        $produk->deskripsi = $request->input('deskripsi_produk');
        $produk->kategori = $request->input('kategori_produk');
        $produk->foto_depan = $fotoDepanPath;
        $produk->foto_belakang = $fotoBelakangPath;
        $produk->foto_kiri = $fotoKiriPath;
        $produk->foto_kanan = $fotoKananPath;
        $produk->save();

        // Simpan detail varian produk
        foreach ($request->variants as $variant) {
            $varian = new VariantProduk();
            $varian->id_produk = $produk->id;
            $varian->warna = $variant['warna'];
            $varian->save();

            // Simpan detail varian sesuai kebutuhan
            foreach ($variant['sizes'] as $size) {
                $detailVarian = new DetailVariantProduk();
                $detailVarian->id_variant_produk = $varian->id;
                $detailVarian->ukuran = $size['ukuran'];
                $detailVarian->stok = $size['stok'];
                $detailVarian->harga_sewa = $size['harga_sewa'];
                $detailVarian->save();
            }
        }

        Alert::toast('Data berhasil disimpan', 'success');
        return back();
    }
}
