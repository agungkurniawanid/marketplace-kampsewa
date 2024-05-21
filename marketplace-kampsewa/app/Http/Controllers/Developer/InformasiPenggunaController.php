<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiPenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('dev');
    }
    public function index(Request $request)
    {
        // ambil user berdasarkan yang baru saja terdaftar
        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')->limit(10)
            ->get();

        // get user pendaftar hari ini
        $user_pendaftar_hari_ini = User::where('created_at', '>=', Carbon::today())->count();

        // get pendaftar kemarin
        $user_pendaftar_kemarin = User::whereDate('created_at', Carbon::yesterday())->count();

        // get total pendaftar minggu ini
        $user_pendaftar_minggu_ini = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        // get total pendaftar minggu kemarin
        $user_pendaftar_minggu_kemarin = User::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count();

        // get total pendaftar bulan ini
        $user_pendaftar_bulan_ini = User::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        // get total pendaftar bulan kemarin
        $user_pendaftar_bulan_kemarin = User::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->count();

        // get total pendaftar tahun ini
        $user_pendaftar_tahun_ini = User::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->count();

        // get total pendaftar tahun kemarin
        $user_pendaftar_tahun_kemarin = User::whereBetween('created_at', [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()])->count();

        $cari_customer = $request->query('cari');
        $filter_customer = $request->query('filter');

        $query = DB::table('users')->where('type', 0);

        // Tambahkan klausa WHERE jika ada kata kunci pencarian
        if (!empty($cari_customer)) {
            $query->where(function ($query) use ($cari_customer) {
                $query->where('name', 'like', '%' . $cari_customer . '%')
                    ->orWhere('nomor_telephone', 'like', '%' . $cari_customer . '%')
                    ->orWhere('email', 'like', '%' . $cari_customer . '%');
            });
        }

        // Tambahkan filter berdasarkan checkbox yang dipilih
        if ($request->has('pengguna_baru')) {
            $query->where('status', 'pengguna_baru');
        }

        if ($request->has('tidak_aktif_sebulan')) {
            $query->where('status', 'tidak_aktif_sebulan');
        }

        if ($request->has('delete_account')) {
            $query->where('status', 'delete_account');
        }

        // Tambahkan urutan berdasarkan filter
        if ($filter_customer == 'terlama') {
            $query->orderBy('users.created_at', 'asc');
        } else {
            $query->orderBy('users.created_at', 'desc');
        }

        $users = $query->paginate(10);


        return view('developers.informas-pengguna')->with([
            'title' => 'Informasi Pengguna',
            'user_baru_terdaftar' => $user_baru_terdaftar,
            'user_pendaftar_hari_ini' => $user_pendaftar_hari_ini,
            'user_pendaftar_kemarin' => $user_pendaftar_kemarin,
            'user_pendaftar_minggu_ini' => $user_pendaftar_minggu_ini,
            'user_pendaftar_minggu_kemarin' => $user_pendaftar_minggu_kemarin,
            'user_pendaftar_bulan_ini' => $user_pendaftar_bulan_ini,
            'user_pendaftar_bulan_kemarin' => $user_pendaftar_bulan_kemarin,
            'user_pendaftar_tahun_ini' => $user_pendaftar_tahun_ini,
            'user_pendaftar_tahun_kemarin' => $user_pendaftar_tahun_kemarin,
            'users' => $users,
            'cari_customer' => $cari_customer,
            'filter_customer' => $filter_customer
        ]);
    }
}
