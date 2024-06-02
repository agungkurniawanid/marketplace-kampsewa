<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detailUser($id_user)
    {
        try {
            // Ambil data user
            $get_data_user = User::select('id', 'name', 'email', 'nomor_telephone')
                ->where('id', $id_user)
                ->first();

            // Cek apakah data ada
            if (!$get_data_user) {
                return response()->json([
                    'message' => 'Data tidak ditemukan!',
                ], 404);
            }

            // Tampilkan respons data
            return response()->json([
                'message' => 'success',
                'data_users' => $get_data_user,
            ]);
        } catch (\Exception $e) {
            // Tangani pengecualian
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil data user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function editProfile($id_user, Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email,' . $id_user,
                'nomor_telephone' => 'required|string|max:13|min:11',
                'tanggal_lahir' => 'required|date',
            ]);

            // Update data user
            $update_user = User::where('id', $id_user)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'nomor_telephone' => $request->input('nomor_telephone'),
                    'tanggal_lahir' => $request->input('tanggal_lahir'),
                ]);

            if ($update_user) {
                $user = User::find($id_user);
                return response()->json([
                    'message' => 'Success Update!',
                    'hasil_update' => $user,
                ], 200);
            }

            return response()->json([
                'message' => 'User tidak ditemukan atau gagal saat update data',
            ], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani pengecualian query database
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            // Tangani pengecualian lainnya
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengupdate profil.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
