<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IklanControlller extends Controller
{
    public function getAllIklan()
    {
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Ambil data iklan yang tanggal mulai kurang dari atau sama dengan hari ini,
        // tanggal akhir lebih dari atau sama dengan hari ini,
        // dan memiliki status_iklan 'aktif'
        $iklan = DB::table('iklan')
            ->join('detail_iklan', 'iklan.id', '=', 'detail_iklan.id_iklan')
            ->whereDate('detail_iklan.tanggal_mulai', '<=', $today)
            ->whereDate('detail_iklan.tanggal_akhir', '>=', $today)
            ->where('detail_iklan.status_iklan', 'aktif')
            ->select('iklan.*')
            ->limit(10)
            ->get();

        // Buat response JSON
        $response = [
            'status' => 'success',
            'message' => 'Data iklan berhasil diambil',
            'data' => $iklan,
        ];

        // Mengembalikan response JSON
        return response()->json($response);
    }
}
