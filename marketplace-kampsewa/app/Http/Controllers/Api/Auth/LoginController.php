<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'identifier' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('nomor_telephone', $request->identifier)
            ->orWhere('email', $request->identifier)
            ->first();
        if ($user) {
            if ($user->type !== 0) {
                return response()->json(['message' => 'Maaf, Anda tidak memiliki hak akses untuk login.'], 401);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('API Token')->plainTextToken;

                $user_online = User::where('nomor_telephone', $request->identifier)
                    ->orWhere('email', $request->identifier)
                    ->first()->update(['status' => 'online']);

                $user_online = User::where('nomor_telephone', $request->identifier)
                    ->orWhere('email', $request->identifier)
                    ->first();

                if ($user_online) {
                    $user_online->time_login = now();
                    $user_online->last_login = now();
                    $user_online->save();
                }

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_at' => now()->addMinutes(60)->toDateTimeString(),
                    'user_online' => $user_online,
                    'user' => $user,
                ]);
            } else {
                return response()->json(['message' => 'Password anda salah.'], 401);
            }
        } else {
            return response()->json(['message' => 'Username pengguna tidak ditemukan.'], 401);
        }
    }
}
