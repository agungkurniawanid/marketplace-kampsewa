<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index() {
        return view('customers.menu-keuangan.menu-keuangan')->with([
            'title' => 'Menu Keuangan',
        ]);
    }
}
