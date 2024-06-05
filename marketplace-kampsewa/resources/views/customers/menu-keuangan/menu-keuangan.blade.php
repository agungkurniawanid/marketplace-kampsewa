@extends('layouts.customers.layouts-customer')
@section('customer-content')
    <div class="--container w-full h-auto md:px-10 md:py-10">
        <div class="--heading w-full h-auto flex md:justify-between md:items-center">
            <div class="--url-penghasilan-pengeluaran w-full flex items-center gap-4">
                <div class="--url-penghasilan"><a href=""
                        class="{{ $title == 'Menu Keuangan' ? 'text-[#6F65D6] bg-[#EEEDFA]' : '' }} p-2 font-medium rounded-lg">Penghasilan</a>
                </div>
                <div class="--url-pengeluaran"><a href=""
                        class="{{ $title == 'Menu Pengeluaran' ? 'text-[#6F65D6] bg-[#EEEDFA]' : '' }} p-2 font-medium rounded-lg">Pengeluaran</a>
                </div>
            </div>
            <div class="--filter-tahun-bulan-cetak flex items-center gap-2">
                <div class="--filter-tahun">
                    <form action="" method="GET">
                        <div class="w-fit relative">
                            <select
                                class="shadow-box-shadow-11 cursor-pointer rounded-lg bg-white appearance-none md:px-6 md:py-2"
                                name="filter_tahun" id="filter-tahun">
                                <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                <option value="{{ date('Y') - 1 }}">{{ date('Y') - 1 }}</option>
                                <option value="{{ date('Y') - 2 }}">{{ date('Y') - 2 }}</option>
                                <option value="{{ date('Y') - 3 }}">{{ date('Y') - 3 }}</option>
                                <option value="{{ date('Y') - 4 }}">{{ date('Y') - 4 }}</option>
                            </select>
                            <i class="absolute right-2 top-1/2 transform -translate-y-1/2 bi bi-caret-down-fill"></i>
                        </div>
                    </form>
                </div>
                <div class="--filter-bulan">
                    <form action="" method="GET">
                        <div class="w-fit relative">
                            <select
                                class="shadow-box-shadow-11 rounded-lg cursor-pointer bg-white appearance-none md:px-4 md:py-2"
                                name="filter_bulan" id="filter-bulan">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <i class="absolute right-2 top-1/2 transform -translate-y-1/2 bi bi-caret-down-fill"></i>
                        </div>
                    </form>
                </div>
                <div class="--filter-cetak">
                    <form action="">
                        <button class="md:px-4 md:py-2 bg-white rounded-lg shadow-box-shadow-11 flex items-center gap-2"><i
                                class="bi bi-printer-fill"></i> Cetak</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="--card-information">
            <div class="--card-penghasilan-pertahun shadow-box-shadow-11 p-4 rounded-lg">
                <div class="--header">
                    <div class="--icon-title flex items-center gap-4">
                        <div class="--icon p-2 bg-[#F3F5F7] w-[34px] h-[34px] flex items-center justify-center rounded-lg">
                            <i class="bi bi-currency-exchange"></i></div>
                        <div class="--title font-medium text-[16px]">Penghasilan Pertahun - {{ date('Y') }}</div>
                    </div>
                </div>
                <div class="--body flex items-start">
                    <div class="--nominal font-bold md:text-[28px]">Rp. 154.000.000</div>
                    <div class="--persentase w-fit font-bold px-2 py-1 rounded-lg text-[#75D5CB] bg-[#E7F8F6]">20.5% <i class="bi bi-arrow-up-right"></i></div>
                </div>
            </div>
            <div class="--card-penghasilan-perbulan"></div>
            <div class="--card-penghasilan-keuntungan"></div>
        </div>
    </div>
@endsection
