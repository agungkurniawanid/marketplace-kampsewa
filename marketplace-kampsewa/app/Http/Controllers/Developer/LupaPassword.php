<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LupaPassword extends Controller
{
    public function index() {
        return view('auth.lupa-password', ['title' => 'Verifikasi Email']);
    }

    public function sendEmail() {}

    public function kodeOTP($id_user) {
        return view('auth.verifikasi-kode-otp', ['title' => 'Verifikasi Kode OTP']);
    }
}
