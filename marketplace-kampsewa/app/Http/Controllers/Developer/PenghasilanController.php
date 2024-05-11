<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function __construct() {
        $this->middleware('dev');
    }
    public function index() {
        return view('developers.penghasilan', ['title' => 'Penghasilan']);
    }
}
