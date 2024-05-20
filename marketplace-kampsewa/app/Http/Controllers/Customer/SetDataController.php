<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }

    public function index() {
        return view('customers.menu-setlokasi-setrekening.lengkapi-data')->with([
            'title' => 'Set Lokasi & Rekening | Customer',
        ]);
    }
}
