<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DetailVariantProduk;
use App\Models\Produk;
use App\Models\VariantProduk;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }
    public function index($id_user)
    {
        return view('customers.menu-produk.produk', ['title' => 'Produk Menu | KampSewa']);
    }
    public function kelolaProduk($id_user)
    {
        $id = Crypt::decrypt($id_user);

        $data_produk = Produk::leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->select(
                'produk.id as id_produk',
                'produk.nama as nama_produk',
                'produk.status as status_produk',
                'produk.foto_depan as foto',
                'variant_produk.id as id_variant_produk',
                'detail_variant_produk.id as id_detail_variant_produk',
                DB::raw('COUNT(detail_variant_produk.stok) as stok_produk'),
            )->where('produk.id_user', $id)->groupBy('produk.id', 'variant_produk.id', 'detail_variant_produk.id');

        $produk_result = $data_produk->get();

        return view('customers.menu-produk.kelola-produk')->with(
            [
                'title' => 'Kelola Produk | KampSewa',
                'produk' => $produk_result,
            ]
        );
    }
    public function sedangDisewa($id_user)
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
                'foto_belakang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'foto_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'foto_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'variants.*.warna' => 'nullable|string',
                'variants.*.sizes.*.ukuran' => 'nullable|string',
                'variants.*.sizes.*.stok' => 'nullable|integer',
                'variants.*.sizes.*.harga_sewa' => 'nullable|integer',
            ]);

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
                    if ($size['ukuran'] === null) {
                        $size['ukuran'] = 'Belum di isi';
                    }
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
