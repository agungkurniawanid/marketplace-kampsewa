<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detailUser($id_user){
        // ambil data user
        $get_data_user = User::select('id', 'name', 'email', 'nomor_telephone')
        ->where('id', $id_user)->first();

        // check apakah data ada
        if(!$get_data_user) {
            return response()->json([
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }

        // tampilkan respons data
        return response()->json([
            'message' => 'success',
            'data_users' => $get_data_user,
        ]);
    }
}
