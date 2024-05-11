<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LupaPassword extends Controller
{
    public function index() {
        return view('auth.lupa-password', ['title' => 'Lupa Password']);
    }
    public function sendEmail(Request $request) {
        return view('auth.pesan-email-terkirim', ['title' => 'Pesan Email Terkirim']);
    }
    public function kodeOTP(Request $request) {
        return view('auth.reset-password', ['title' => 'Reset Password']);
    }
    public function resetPassword(Request $request) {
        return redirect()->route('login');
    }
}
