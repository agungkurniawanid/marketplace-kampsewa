<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPencarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatPencarianController extends Controller
{
    // fungsi untuk ketika user mengetikkan pencarian
    // maka kata kunci pencarian tersebut akan disimpan
    public function insert($id_user, Request $request) {
        $validasi = Validator::make($request->all(), [
            'kata_kunci' => 'nullable|string|max:30',
        ]);

        if ($validasi->fails()) {
            return response()->json(['error' => $validasi->errors()], 400);
        }

        $table_riwayat_pencarian = new RiwayatPencarian();
        $table_riwayat_pencarian->id_user = $id_user;
        $table_riwayat_pencarian->kata_kunci = $request->kata_kunci;
        $table_riwayat_pencarian->save();

        return response()->json([
            'message' => 'success',
        ], 200);
    }

    // fungsi untuk menampilkan riwayat pencarian
    public function show($id_user) {
        $table_riwayat_pencarian = RiwayatPencarian::where('id_user', $id_user)
        ->select('kata_kunci')->limit(5)->get();

        if(!$table_riwayat_pencarian) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => "success",
            'data' => $table_riwayat_pencarian,
        ]);
    }
}