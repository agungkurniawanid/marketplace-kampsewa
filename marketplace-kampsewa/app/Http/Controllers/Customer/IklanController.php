<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function __construct() {
        $this->middleware('cust');
    }

    public function index() {
        return view('customers.menu-iklan.iklan', ['title' => 'Iklan | Customer']);
    }
}
