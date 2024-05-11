<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Penyewaan extends Controller
{
    // ! main function
    public function index(){
        return view('developers.informasi-penyewaan', ['title' => 'Penyewaan']);
    }
}
