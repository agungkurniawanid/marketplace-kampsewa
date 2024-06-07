<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\DetailIklan;
use App\Models\Iklan;
use App\Models\Pemasukan;
use App\Models\PembayaranIklan;
use App\Models\User;
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

    public function index($id_user)
    {
        $get_total_user_menggunakan_iklan = Iklan::count();

        $get_iklan = Iklan::join('detail_iklan', 'iklan.id', '=', 'detail_iklan.id_iklan')
            ->join('users', 'users.id', '=', 'iklan.id_user')
            ->select(
                'iklan.id as id_iklan',
                'iklan.poster',
                'iklan.judul',
                'detail_iklan.id as id_detail_iklan',
                'detail_iklan.tanggal_mulai',
                'detail_iklan.tanggal_akhir',
                'detail_iklan.harga_iklan',
            )->where('iklan.id_user', Crypt::decrypt($id_user));

        $iklan_berlangsung = $get_iklan->where('detail_iklan.status_iklan', 'Aktif')
            ->groupBy(
                'iklan.id',
                'iklan.poster',
                'iklan.judul',
                'detail_iklan.id',
                'detail_iklan.tanggal_mulai',
                'detail_iklan.tanggal_akhir',
            )->get();

        $iklan_pending = Iklan::join('detail_iklan', 'iklan.id', '=', 'detail_iklan.id_iklan')
            ->join('users', 'users.id', '=', 'iklan.id_user')
            ->select(
                'iklan.id as id_iklan',
                'iklan.poster',
                'iklan.judul',
                'detail_iklan.id as id_detail_iklan',
                'detail_iklan.tanggal_mulai',
                'detail_iklan.tanggal_akhir',
                'detail_iklan.harga_iklan',
            )->where('iklan.id_user', Crypt::decrypt($id_user))->where('detail_iklan.status_iklan', 'Pending')
            ->groupBy(
                'iklan.id',
                'iklan.poster',
                'iklan.judul',
                'detail_iklan.id',
                'detail_iklan.tanggal_mulai',
                'detail_iklan.tanggal_akhir',
            )->get();

        // Looping untuk menghitung durasi iklan dalam format hari
        foreach ($iklan_berlangsung as $iklan) {
            $tanggal_mulai = strtotime($iklan->tanggal_mulai);
            $tanggal_akhir = strtotime($iklan->tanggal_akhir);

            // Hitung perbedaan waktu antara tanggal mulai dan tanggal akhir dalam detik
            $durasi_detik = $tanggal_akhir - $tanggal_mulai;

            // Konversi detik menjadi hari
            $durasi_hari = floor($durasi_detik / (60 * 60 * 24));

            // Tambahkan durasi hari ke objek iklan
            $iklan->durasi_hari = $durasi_hari;
        }

        // Looping untuk menghitung durasi iklan dalam format hari
        foreach ($iklan_pending as $iklan) {
            $tanggal_mulai = strtotime($iklan->tanggal_mulai);
            $tanggal_akhir = strtotime($iklan->tanggal_akhir);

            // Hitung perbedaan waktu antara tanggal mulai dan tanggal akhir dalam detik
            $durasi_detik = $tanggal_akhir - $tanggal_mulai;

            // Konversi detik menjadi hari
            $durasi_hari = floor($durasi_detik / (60 * 60 * 24));

            // Tambahkan durasi hari ke objek iklan
            $iklan->durasi_hari = $durasi_hari;
        }

        return view('customers.menu-iklan.iklan')->with([
            'title' => 'Iklan | Customer',
            'total_data_iklan' => $get_total_user_menggunakan_iklan,
            'iklan_berlangsung' => $iklan_berlangsung,
            'iklan_pending' => $iklan_pending,
        ]);
    }


    public function pilihDurasiIklan($id_user)
    {
        $id_user_dec = Crypt::decryptString($id_user);

        // $bank = Bank::where('id_user', $id_user_dec)->count();
        // if ($bank == 0) {
        //     Alert::warning('Nomor Rekening Belum di isi', 'Silahkan lengkapi data nomor rekening anda dahulu, pilih Menu Transaksi lalu pilih Set Lokasi Toko & Rekening')->persistent(true);
        //     return back();
        // }

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

    public function simpanIklan($id_user, $harga_iklan, $durasi, Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'poster' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required|string|max:100',
            'sub_judul' => 'required|string|max:200',
            'deskripsi' => 'required|string|max:800',
        ], [
            'poster.required' => 'Poster harus diunggah.',
            'poster.image' => 'Poster harus berupa gambar.',
            'poster.mimes' => 'Poster harus berupa file dengan format: png, jpg, jpeg.',
            'poster.max' => 'Ukuran poster tidak boleh lebih dari 2048 kilobytes.',
            'judul.required' => 'Judul iklan harus diisi.',
            'judul.string' => 'Judul iklan harus berupa teks.',
            'judul.max' => 'Judul iklan tidak boleh lebih dari 100 karakter.',
            'sub_judul.required' => 'Sub judul iklan harus diisi.',
            'sub_judul.string' => 'Sub judul iklan harus berupa teks.',
            'sub_judul.max' => 'Sub judul iklan tidak boleh lebih dari 200 karakter.',
            'deskripsi.required' => 'Deskripsi iklan harus diisi.',
            'deskripsi.string' => 'Deskripsi iklan harus berupa teks.',
            'deskripsi.max' => 'Deskripsi iklan tidak boleh lebih dari 800 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id_user_dec = Crypt::decryptString($id_user);
        $user_data = User::where('id', $id_user_dec)->first();

        // Cek apakah user sudah membuat iklan dalam durasi yang dipilih
        $endDate = Carbon::today()->subDays($durasi);
        $existingAd = Iklan::where('id_user', $id_user_dec)
            ->where('created_at', '>', $endDate)
            ->first();

        if ($existingAd) {
            Alert::toast('Anda tidak dapat membuat iklan baru sebelum ' . $durasi . ' hari dari transaksi terakhir.');
            return redirect()->back()
                ->withErrors(['error' => 'Anda tidak dapat membuat iklan baru sebelum ' . $durasi . ' hari dari transaksi terakhir.'])
                ->withInput();
        }

        // Set up Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $harga_iklan,
            ],
            'customer_details' => [
                'first_name' => $user_data->name,
                'email' => $user_data->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $iklan = new Iklan($request->all());
        $iklan->snap_token = $snapToken;

        if ($request->hasFile('poster')) {
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

    public function inputPembayaranIklan($id_user, $harga_iklan, $durasi)
    {
        $id_user_decrypt = Crypt::decryptString($id_user);
        $harga_iklan_dec = Crypt::decrypt($harga_iklan);
        $durasi_dec = Crypt::decryptString($durasi);

        // Ambil semua iklan yang statusnya pending atau aktif
        $iklanAktif = DB::table('detail_iklan')
            ->whereIn('status_iklan', ['pending', 'aktif'])
            ->orderBy('tanggal_mulai')
            ->get();

        // Tentukan tanggal mulai dan akhir
        $tanggalMulai = Carbon::today();
        $tanggalAkhir = Carbon::today()->addDays($durasi_dec);

        // Periksa ketersediaan tanggal dan limit
        list($tanggalMulai, $tanggalAkhir) = $this->cekKetersediaanTanggal($tanggalMulai, $tanggalAkhir, $iklanAktif, $durasi_dec);

        $iklan = Iklan::where('id_user', $id_user_decrypt)->latest()->first();
        $id_iklan = $iklan->id;
        $snap_token = $iklan->snap_token;

        return view('customers.menu-iklan.input-table-pembayaran')->with([
            'title' => 'Iklan | Customer',
            'id_user' => $id_user_decrypt,
            'harga_iklan' => $harga_iklan_dec,
            'id_iklan' => $id_iklan,
            'durasi' => $durasi_dec,
            'tanggal_mulai' => $tanggalMulai->toDateString(),
            'tanggal_akhir' => $tanggalAkhir->toDateString(),
            'snap_token' => $snap_token,
        ]);
    }

    public function simpanPembayaranIklan(Request $request)
    {
        $request->validate([
            'id_iklan' => 'required|string',
            'id_user' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'harga_iklan' => 'required|numeric',
        ]);

        $status_iklan = Carbon::today() < $request->tanggal_mulai ? 'pending' : 'aktif';

        try {
            // Simpan detail iklan
            DetailIklan::create([
                'id_iklan' => $request->id_iklan,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'harga_iklan' => $request->harga_iklan,
                'status_iklan' => $status_iklan,
            ]);

            // Simpan pembayaran iklan
            PembayaranIklan::create([
                'id_iklan' => $request->id_iklan,
                'id_user' => $request->id_user,
                'metode_bayar' => 'Transfer',
                'total_bayar' => $request->harga_iklan,
                'status_bayar' => 'lunas',
            ]);

            // Simpan Pemasukan
            Pemasukan::create([
                'id_user' => $request->id_user,
                'sumber' => 'Layanan Iklan',
                'deskripsi' => 'Sumber pemasukan didapatkan dari Customer yang menggunakan layanan iklan',
                'nominal' => $request->harga_iklan,
            ]);

            Alert::toast('Terimakasih memberikan kepercayaan layanan iklan kami dengan berlangganan.');
            return redirect()->route('buat-iklan.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }
}
