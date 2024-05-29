<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DetailVariantProduk;
use App\Models\Produk;
use App\Models\VariantProduk;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }
    public function index()
    {
        return view('customers.menu-produk.produk', ['title' => 'Produk Menu | KampSewa']);
    }
    public function kelolaProduk()
    {
        return view('customers.menu-produk.kelola-produk', ['title' => 'Kelola Produk | KampSewa']);
    }
    public function sedangDisewa()
    {
        return view('customers.menu-produk.sedang-disewa', ['title' => 'Sedang Disewa | KampSewa']);
    }
    public function tambahProduk($id_user)
    {
        $id_user_dec = Crypt::decrypt($id_user);
        return view('customers.menu-produk.tambah-produk')->with([
            'title' => 'Tambah Produk',
            'id' => $id_user_dec,
        ]);
    }
    public function tambahProdukPost(Request $request)
    {
        try {
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
                'variants.*.warna' => 'required|string',
                'variants.*.sizes.*.ukuran' => 'required|string',
                'variants.*.sizes.*.stok' => 'required|integer',
                'variants.*.sizes.*.harga_sewa' => 'required|integer',
            ]);

            if(empty($request->input('nama_produk'))) {
                Alert::toast('Nama Produk Tidak Boleh Kosong!', 'warning');
                return back();
            }

            $request->merge([
                'status' => 'Tersedia',
            ]);

            // Simpan data produk
            $produk = new Produk();
            $produk->id_user = $request->input('id_user');
            $produk->nama = $request->input('nama_produk');
            $produk->deskripsi = $request->input('deskripsi_produk');
            $produk->kategori = $request->input('kategori_produk');

            // Simpan gambar-gambar
            if ($request->hasFile('foto_depan')) {
                $foto_depan = $request->file('foto_depan');
                $fotoDepanName = time() . '_depan.' . $foto_depan->getClientOriginalExtension();
                $foto_depan->move(public_path('assets/image/customers/produk/'), $fotoDepanName);
                $produk->foto_depan = $fotoDepanName;
            }

            if ($request->hasFile('foto_belakang')) {
                $foto_belakang = $request->file('foto_belakang');
                $fotoBelakangName = time() . '_belakang.' . $foto_belakang->getClientOriginalExtension();
                $foto_belakang->move(public_path('assets/image/customers/produk/'), $fotoBelakangName);
                $produk->foto_belakang = $fotoBelakangName;
            }

            if ($request->hasFile('foto_kiri')) {
                $foto_kiri = $request->file('foto_kiri');
                $fotoKiriName = time() . '_kiri.' . $foto_kiri->getClientOriginalExtension();
                $foto_kiri->move(public_path('assets/image/customers/produk/'), $fotoKiriName);
                $produk->foto_kiri = $fotoKiriName;
            }

            if ($request->hasFile('foto_kanan')) {
                $foto_kanan = $request->file('foto_kanan');
                $fotoKananName = time() . '_kanan.' . $foto_kanan->getClientOriginalExtension();
                $foto_kanan->move(public_path('assets/image/customers/produk/'), $fotoKananName);
                $produk->foto_kanan = $fotoKananName;
            }

            $produk->save();

            // Simpan detail varian produk
            foreach ($request->variants as $variant) {
                $varian = new VariantProduk();
                $varian->id_produk = $produk->id;
                $varian->warna = $variant['warna'];
                $varian->save();

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
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            Log::error('Error: ' . $e->getMessage());
            return back();
        }
    }
}
