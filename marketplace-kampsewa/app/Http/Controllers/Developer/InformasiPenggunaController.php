<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiPenggunaController extends Controller
{
    public function index() {
        return view('developers.informas-pengguna', ['title' => 'Informasi Pengguna']);
    }
}
