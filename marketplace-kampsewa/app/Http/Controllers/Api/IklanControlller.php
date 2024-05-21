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
        $today = Carbon::today();
        $iklan = DB::table('iklan')
            ->join('detail_iklan', 'iklan.id', '=', 'detail_iklan.id_iklan')
            ->whereDate('detail_iklan.tanggal_mulai', '<=', $today)
            ->whereDate('detail_iklan.tanggal_akhir', '>=', $today)
            ->where('detail_iklan.status_iklan', 'aktif')
            ->select('iklan.id', 'iklan.poster', 'iklan.judul')
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

    public function getDetailIklan($identifier)
    {
        $iklan = Iklan::where('id', $identifier)
            ->orWhere('judul', $identifier)
            ->first();

        if (!$iklan) {
            return response()->json([
                'message' => 'Iklan not found'
            ], 404);
        }

        return response()->json([
            'iklan' => $iklan,
            'message' => 'Success',
        ], 200);
    }
}
