<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class SetDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('cust');
    }

    public function index() {
        $location = Location::get('125.166.117.21');
        return view('customers.menu-setlokasi-setrekening.lengkapi-data')->with([
            'title' => 'Set Lokasi & Rekening | Customer',
            'location' => $location
        ]);
    }
}
