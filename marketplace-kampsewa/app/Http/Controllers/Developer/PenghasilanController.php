<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    // index
    public function index() {
        return view('developers.penghasilan', ['title' => 'Penghasilan']);
    }
}
