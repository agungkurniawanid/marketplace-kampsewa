<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }
    public function index($id_user)
    {
        // decrypt id user yang dikirimkan
        $id_user_decrypt = Crypt::decrypt($id_user);

        // get data pemasukan untuk
        $data_pemasukan = Pemasukan::where('id_user', $id_user_decrypt);

        $search = request()->query('search');
        $filter_tahun = request()->input('filter_tahun');
        $filter_bulan = request()->input('filter_bulan');

        $tahun = Carbon::now()->year;

        // get sum nominal tahun sekaran
        $total_tahun_sekarang = Pemasukan::where('id_user', $id_user_decrypt)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('nominal');

        // get sum nominal tahun lalu
        $total_tahun_lalu = Pemasukan::where('id_user', $id_user_decrypt)
            ->whereYear('created_at', Carbon::now()->subYear()->year)
            ->sum('nominal');

        // get pengeluaran
        $pengeluaran_tahun_ini = Pengeluaran::where('id_user', $id_user_decrypt)
            ->whereYear('created_at', Carbon::now()->year)->sum('nominal');
        $pengeluaran_tahun_lalu = Pengeluaran::where('id_user', $id_user_decrypt)
            ->whereYear('created_at', Carbon::now()->subYear()->year)->sum('nominal');

        $total_perbulan = Pemasukan::where('id_user', $id_user_decrypt)->whereYear('created_at', Carbon::now()->year);

        // Hitung persentase kenaikan penghasilan
        if ($total_tahun_lalu != 0) {
            $kenaikan_persentase = (($total_tahun_sekarang - $total_tahun_lalu) / abs($total_tahun_lalu)) * 100;
            $kenaikan_persentase = min($kenaikan_persentase, 100);
        } else {
            $kenaikan_persentase = 0;
        }

        // Filter berdasarkan tahun jika ada
        if (request()->has('filter_tahun')) {
            $tahun = request()->input('filter_tahun');
            $data_pemasukan->whereYear('created_at', $tahun);
            $total_tahun_sekarang = Pemasukan::where('id_user', $id_user_decrypt)
                ->whereYear('created_at', $tahun)
                ->sum('nominal');
            if ($total_tahun_lalu != 0) {
                $kenaikan_persentase = (($total_tahun_sekarang - $total_tahun_lalu) / abs($total_tahun_lalu)) * 100;
                $kenaikan_persentase = min($kenaikan_persentase, 100);
            } else {
                $kenaikan_persentase = 0;
            }
            $total_perbulan->whereYear('created_at', $tahun);
        }
        // Filter berdasarkan bulan jika ada
        if (request()->has('filter_bulan')) {
            $bulan = request()->input('filter_bulan');
            if ($bulan !== 'semua_bulan') { // Jika bukan "semua bulan", lakukan filter
                $data_pemasukan->whereMonth('created_at', $bulan);
                $total_perbulan->whereMonth('created_at', $bulan);
            }
        }

        // Filter berdasarkan pencarian jika ada
        if ($search) {
            $data_pemasukan->where(function ($query) use ($search) {
                $query->where('nominal', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        $get_data = $data_pemasukan->get();
        $get_total_tahun_sekarang = $total_tahun_sekarang;

        // Hitung total perbulan
        if (!request()->has('filter_bulan') || request()->input('filter_bulan') === 'semua_bulan') {
            $total_perbulan = $total_perbulan->whereMonth('created_at', Carbon::now()->month)->sum('nominal');
        } else {
            $total_perbulan = $total_perbulan->sum('nominal');
        }

        // Hitung persentase kenaikan penghasilan bulanan
        $total_perbulan_lalu = Pemasukan::where('id_user', $id_user_decrypt)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('nominal');
        if ($total_perbulan_lalu != 0) {
            $kenaikan_persentase_perbulan = (($total_perbulan - $total_perbulan_lalu) / abs($total_perbulan_lalu)) * 100;
            $persentase_perbulan = min($kenaikan_persentase_perbulan, 100);
        } else {
            $persentase_perbulan = 0;
        }

        // hitung persentase keuntungan
        $keuntungan_tahun_ini = $total_tahun_sekarang - $pengeluaran_tahun_ini;
        $keuntungan_tahun_lalu = $total_tahun_lalu - $pengeluaran_tahun_lalu;

        // jika keuntungan negatif, atur menjadi 0
        if ($keuntungan_tahun_ini < 0) {
            $keuntungan_tahun_ini = 0;
        }

        if ($keuntungan_tahun_lalu < 0) {
            $keuntungan_tahun_lalu = 0;
        }

        // Hitung persentase kenaikan keuntungan
        if ($keuntungan_tahun_lalu != 0) {
            $kenaikan_persentase_keuntungan = (($keuntungan_tahun_ini - $keuntungan_tahun_lalu) / abs($keuntungan_tahun_lalu)) * 100;
            $persentase_keuntungan = min($kenaikan_persentase_keuntungan, 100);
        } else {
            $persentase_keuntungan = 0;
        }

        return view('customers.menu-keuangan.menu-keuangan')->with([
            'title' => 'Menu Keuangan',
            'data_pemasukan' => $get_data,
            'total_tahun_sekarang' => $get_total_tahun_sekarang,
            'persentase_pertahun' => $kenaikan_persentase,
            'persentase_perbulan' => $persentase_perbulan,
            'total_perbulan' => $total_perbulan,
            'keuntungan' => $keuntungan_tahun_ini,
            'persentase_keuntungan' => $persentase_keuntungan,
            'search' => $search,
            'filter_tahun' => $filter_tahun,
            'filter_bulan' => $filter_bulan,
            'tahun' => $tahun,
        ]);
    }

    public function penghasilan($id_user)
    {
    }
}
