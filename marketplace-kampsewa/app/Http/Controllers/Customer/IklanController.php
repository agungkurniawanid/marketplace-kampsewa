<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class IklanController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }

    public function index()
    {
        return view('customers.menu-iklan.iklan')->with([
            'title' => 'Iklan | Customer',
        ]);
    }

    public function pilihDurasiIklan($id_user)
    {
        return view('customers.menu-iklan.pilih-durasi-iklan')->with([
            'title' => 'Iklan | Customer',
            'id_user' => $id_user,
        ]);
    }

    public function layananIklan($id_user, $harga_iklan)
    {
        $id_user_decrypt  = Crypt::decryptString($id_user);

        $paket = $this->getDurasiDanHargaBerdasarkanPaket($harga_iklan);
        $harga_sewa_iklan = $paket['harga'];
        $durasi_sewa_iklan = $paket['durasi'];

        return view('customers.menu-iklan.input-table-iklan')->with([
            'title' => 'Iklan | Customer',
            'id_user_dec' => $id_user_decrypt,
            'id_user' => $id_user,
            'harga_sewa_iklan' => $harga_sewa_iklan,
            'durasi_sewa_iklan' => $durasi_sewa_iklan,
        ]);
    }

    private function getDurasiDanHargaBerdasarkanPaket($harga_iklan)
    {
        $paket = [
            'paling-murah' => ['durasi' => 1, 'harga' => 50000],
            'murah' => ['durasi' => 2, 'harga' => 90000],
            'sedang' => ['durasi' => 3, 'harga' => 120000],
            'ideal' => ['durasi' => 5, 'harga' => 200000],
            'populer' => ['durasi' => 7, 'harga' => 250000],
            'premium' => ['durasi' => 10, 'harga' => 300000],
            'ultimate' => ['durasi' => 14, 'harga' => 400000],
        ];

        return $paket[$harga_iklan] ?? ['durasi' => 1, 'harga' => 10000];
    }

    private function cekKetersediaanTanggal($tanggalMulai, $tanggalAkhir, $iklanAktif, $durasi)
    {
        $tanggalMulaiAwal = $tanggalMulai;

        while (true) {
            $iklanDalamRentang = $iklanAktif->filter(function ($iklan) use ($tanggalMulai, $tanggalAkhir) {
                $iklanMulai = Carbon::parse($iklan->tanggal_mulai);
                $iklanAkhir = Carbon::parse($iklan->tanggal_akhir);
                return ($tanggalMulai->between($iklanMulai, $iklanAkhir) || $tanggalAkhir->between($iklanMulai, $iklanAkhir));
            });

            // Jika jumlah iklan dalam rentang kurang dari 10, kembalikan tanggal awal
            if ($iklanDalamRentang->count() < 10) {
                break;
            }

            // Jika jumlah iklan dalam rentang >= 10, geser tanggal mulai dan akhir
            $tanggalMulai = $tanggalMulaiAwal->addDay();
            $tanggalAkhir = $tanggalMulai->copy()->addDays($durasi);
        }

        return [$tanggalMulai, $tanggalAkhir];
    }

    public function simpanIklan($id_user, $harga_iklan, $durasi, Request $request) {
        $validator = Validator::make(request()->all(), [
            'poster' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required|string|max:30',
            'sub_judul' => 'required|string|max:60',
            'deskripsi' => 'required|string|max:500',
        ], [
            'poster.required' => 'Poster harus diunggah.',
            'poster.image' => 'Poster harus berupa gambar.',
            'poster.mimes' => 'Poster harus berupa file dengan format: png, jpg, jpeg.',
            'poster.max' => 'Ukuran poster tidak boleh lebih dari 2048 kilobytes.',
            'judul.required' => 'Judul iklan harus diisi.',
            'judul.string' => 'Judul iklan harus berupa teks.',
            'judul.max' => 'Judul iklan tidak boleh lebih dari 30 karakter.',
            'sub_judul.required' => 'Sub judul iklan harus diisi.',
            'sub_judul.string' => 'Sub judul iklan harus berupa teks.',
            'sub_judul.max' => 'Sub judul iklan tidak boleh lebih dari 60 karakter.',
            'deskripsi.required' => 'Deskripsi iklan harus diisi.',
            'deskripsi.string' => 'Deskripsi iklan harus berupa teks.',
            'deskripsi.max' => 'Deskripsi iklan tidak boleh lebih dari 500 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $iklan = new Iklan($request->all());

        if($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $posterName = time() . '.' . $poster->getClientOriginalExtension();
            $poster->move(public_path('assets/image/customers/advert/'), $posterName);
            $iklan->poster = $posterName;
        }

        $iklan->save();
        $harga_iklan_enc = Crypt::encrypt($harga_iklan);
        $durasi_enc = Crypt::encryptString($durasi);

        Alert::success('Berhasil', 'Iklan berhasil ditambahkan.');
        return redirect('/customer/dashboard/input-pembayaran-iklan/' . $id_user . '/' . $harga_iklan_enc . '/' . $durasi_enc);
    }

    public function inputPembayaranIklan($id_user, $harga_iklan, $durasi) {
        $id_user_decrypt = Crypt::decryptString($id_user);
        $harga_iklan = Crypt::decrypt($harga_iklan);
        $durasi_dec = Crypt::decryptString($durasi);

        $iklan = Iklan::where('id_user', $id_user_decrypt)->latest()->first();
        $id_iklan = $iklan->id;
        return view('customers.menu-iklan.input-table-pembayaran')->with([
            'title' => 'Iklan | Customer',
            'id_user' => $id_user_decrypt,
            'harga_iklan' => $harga_iklan,
            'id_iklan' => $id_iklan,
            'durasi' => $durasi_dec,
        ]);
    }
}
