@extends('layouts.customers.layouts-customer')
@section('customer-content')
    <div class="--container w-full h-auto flex justify-center px-10 py-5">
        <div class="--wrapper-form w-[700px] h-auto bg-white shadow-box-shadow-11 p-4">
            <h1 class="text-[20px] font-bold">Tambah Barang Penyewaan</h1>
            <p>Tambahkan barang penyewaan! anda bisa memasukkan data barang dengan banyak ukuran dan jenis, seperti warna,
                stok, dan harga sewa yang berbeda.</p>
            <form action="" class="w-full h-auto">
                @csrf
            </form>
        </div>
    </div>
@endsection
