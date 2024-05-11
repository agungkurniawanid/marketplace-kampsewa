<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapKeuanganController extends Controller
{
    // index
    public function index() {
        return view('developers.rekap-keuangan', ['title' => 'Rekap Keuangan | Developer']);
    }
}
