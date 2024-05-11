<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // index
    function index() {
        return view('developers.pengeluaran', ['title' => 'Pengeluaran']);
    }
}
