@extends('layouts.customers.layouts-customer')
@section('customer-content')
    <div class="--container px-10 py-5 w-full h-auto flex justify-center">
        <div class="--wrapper-form w-[700px] h-auto bg-white shadow-box-shadow-11 p-4">
            <form action="">
                <div class="--header">
                    <div class="--icon-title flex items-center gap-4">
                        <div
                            class="--icon min-w-[50px] w-[50px] h-[50px] bg-[#E5F8EB] rounded-full flex justify-center items-center">
                            <i class="text-[#00B323] bi bi-amd"></i></div>
                        <div class="--title">
                            <p class="text-[24px] font-black">Final Registrasi & Pembayaran</p>
                            <p>Pada tahap ini anda harus mengisi data-data yang dibutuhkan dan melakukan pembayaran melalui
                                transfer pada bank yang telah disediakan.</p>
                        </div>
                    </div>
                    <div class="--bank">
                    </div>
                </div>
                <div class="--body"></div>
                <div class="--footer"></div>
            </form>
        </div>
    </div>
@endsection
