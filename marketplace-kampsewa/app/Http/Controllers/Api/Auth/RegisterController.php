<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telefon' => 'required|string|max:13',
            'password' => 'required|string|min:6',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:tb_users',
            'remember_token' => 'nullable|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $request->merge([
            'status' => 'Aktif',
            'level' => 'customer',
        ]);
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/image/customers/profile/'), $fotoName);
            $user->foto = $fotoName;
        }
        if ($request->hasFile('background')) {
            $background = $request->file('background');
            $backgroundName = time() . '.' . $background->getClientOriginalExtension();
            $background->move(public_path('assets/image/customers/background/'), $backgroundName);
            $user->background = $backgroundName;
        }
        $user->save();
        return response()->json(['message' => 'User berhasil didaftarkan'], 201);
    }
}
