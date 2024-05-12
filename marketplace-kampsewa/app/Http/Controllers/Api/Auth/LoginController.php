<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // ! fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'identifier' => ['required'],
            'password' => ['required'],
        ]);

        // Cari pengguna berdasarkan nomor telepon atau email
        $user = User::where('nomor_telefon', $request->identifier)
            ->orWhere('email', $request->identifier)
            ->first();

        // Jika pengguna ditemukan
        if ($user) {
            // Jika level pengguna bukan "Customer"
            if ($user->level !== 'customer') {
                return response()->json(['message' => 'Maaf, Anda tidak memiliki hak akses untuk login.'], 401);
            }

            // Periksa kredensial pengguna
            if (Hash::check($request->password, $user->password)) {
                // Buat token autentikasi
                $token = $user->createToken('API Token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_at' => now()->addMinutes(60)->toDateTimeString(),
                    'user' => $user,
                ]);
            } else {
                return response()->json(['message' => 'Password anda salah.'], 401);
            }
        } else {
            // Jika pengguna tidak ditemukan
            return response()->json(['message' => 'Username pengguna tidak ditemukan.'], 401);
        }
    }
}
