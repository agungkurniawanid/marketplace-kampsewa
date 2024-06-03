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

        $search = request()->query('search');

        $data_produk = Produk::leftJoin('variant_produk', 'produk.id', '=', 'variant_produk.id_produk')
            ->leftJoin('detail_variant_produk', 'variant_produk.id', '=', 'detail_variant_produk.id_variant_produk')
            ->select(
                'produk.id as id_produk',
                'produk.id_user as id_user',
                'produk.nama as nama_produk',
                'produk.status as status_produk',
                'produk.foto_depan as foto',
                DB::raw('SUM(detail_variant_produk.stok) as stok_produk')
            )->where('produk.id_user', $id)
            ->groupBy('produk.id', 'produk.nama', 'produk.status', 'produk.foto_depan');

            if ($search) {
                $data_produk->where(function ($query) use ($search) {
                    $query->where('produk.nama', 'LIKE', "%{$search}%")
                        ->orWhere('produk.status', $search);
                });
            }

        $produk_result = $data_produk->get();

        return view('customers.menu-produk.kelola-produk')->with(
            [
                'title' => 'Kelola Produk | KampSewa',
                'produk' => $produk_result,
                'search' => $search,
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
            Alert::toast('Terjadi kesalahan, harap check inputan anda kembali!', 'warning');
            Log::error('Error: ' . $e->getMessage());
            return back();
        }
    }

    public function deleteProduk($id_produk)
    {
        try {
            $table_produk = Produk::where('id', $id_produk);
            if (!$table_produk) {
                Alert::toast('Gagal menghapus produk coba lagi nanti!', 'warning');
                return back();
            }
            $table_produk->delete();
            Alert::toast('Produk berhasil dihapus!', 'success');
            return back();
        } catch (\Exception $error) {
            Log::error('Error : ' . $error->getMessage());
        }
    }

    public function detailProduk($nama_produk, $id_user) {
        return view('customers.menu-produk.detail-produk')->with([
            'title' => 'Detail Produk',
        ]);
    }

    public function updateProduk($id_produk, $id_user) {
        // Decrypt the ids
        $id_produk_decrypt = Crypt::decrypt($id_produk);
        $id_user_decrypt = Crypt::decrypt($id_user);

        // Retrieve the product, variants, and detail variants
        $table_produk = Produk::where('id', $id_produk_decrypt)
            ->where('id_user', $id_user_decrypt)
            ->first();

        $table_variant_produk = VariantProduk::where('id_produk', $id_produk_decrypt)
            ->get();

        $table_detail_variant_produk = DetailVariantProduk::whereIn('id_variant_produk', $table_variant_produk->pluck('id'))
            ->get()
            ->groupBy('id_variant_produk');

        // Pass data to the view
        return view('customers.menu-produk.update-produk')->with([
            'title' => 'Update Produk',
            'id_produk' => $id_produk_decrypt,
            'id_user' => $id_user_decrypt,
            'produk' => $table_produk,
            'variants' => $table_variant_produk,
            'detail_variants' => $table_detail_variant_produk,
        ]);
    }

}
