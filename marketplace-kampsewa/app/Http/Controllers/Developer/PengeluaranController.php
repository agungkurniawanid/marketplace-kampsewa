<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function __construct() {
        $this->middleware('dev');
    }
    function index() {
        return view('developers.pengeluaran', ['title' => 'Pengeluaran']);
    }
}
