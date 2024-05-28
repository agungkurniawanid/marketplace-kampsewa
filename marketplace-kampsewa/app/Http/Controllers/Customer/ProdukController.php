<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
    public function tambahProduk($id_user) {
        $id_user_dec = Crypt::decrypt($id_user);
        return view('customers.menu-produk.tambah-produk')->with([
            'title' => 'Tambah Produk',
        ]);
    }
    public function tambahProdukPost($id_user) {
    }
}
