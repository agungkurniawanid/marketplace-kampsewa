<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct() {
        $this->middleware('cust');
    }
    public function index() {
        return view('customers.menu-produk.produk', ['title' => 'Produk Menu | KampSewa']);
    }
    public function kelolaProduk() {
        return view('customers.menu-produk.kelola-produk', ['title' => 'Kelola Produk | KampSewa']);
    }
    public function sedangDisewa() {
        return view('customers.menu-produk.sedang-disewa', ['title' => 'Sedang Disewa | KampSewa']);
    }
}
