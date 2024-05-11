@extends('layouts.developers.ly-dashboard')
@section('content')
    <div class="_container flex flex-col gap-8 p-8">
        <div class="_component-card-statistik w-full grid grid-cols-4 gap-4">
            <div
                class="_total-pengguna-daftar-hari-ini flex flex-col justify-between w-full h-auto bg-white rounded-[20px] p-4">
                <div class="_header">
                    <p class="text-[18px] font-medium text-[#BAC3DC]">Total Pendaftar<br />Hari ini</p>
                </div>
                <div class="_body">
                    <p class="text-[28px] font-bold">0 User</p>
                </div>
                <div class="_footer">
                    <p class="text-[14px]">Total User yang mendaftar hari selasa kemarin adalah <b>109 User</b>.</p>
                    <p><a class="text-[14px] hover:underline text-blue-500" href="">Lihat Selengkapnya</a></p>
                </div>
            </div>
            <div
                class="_total-pengguna-daftar-minggu-ini flex flex-col justify-between w-full h-auto bg-white rounded-[20px] p-4">
                <div class="_header">
                    <p class="text-[18px] font-medium text-[#BAC3DC]">Total Pendaftar<br />Minggu ini</p>
                </div>
                <div class="_body">
                    <p class="text-[28px] font-bold">14 User</p>
                </div>
                <div class="_footer">
                    <p class="text-[14px]">Total User yang mendaftar minggu kemarin adalah <b>109 User</b>.</p>
                    <p><a class="text-[14px] hover:underline text-blue-500" href="">Lihat Selengkapnya</a></p>
                </div>
            </div>
            <div
                class="_total-pengguna-daftar-bulan-ini flex flex-col justify-between w-full h-auti bg-white rounded-[20px] p-4">
                <div class="_header">
                    <p class="text-[18px] font-medium text-[#BAC3DC]">Total Pendaftar<br />Bulan ini</p>
                </div>
                <div class="_body">
                    <p class="text-[28px] font-bold">234 User</p>
                </div>
                <div class="_footer">
                    <p class="text-[14px]">Total User yang mendaftar bulan ini adalah <b>109 User</b>.</p>
                    <p><a class="text-[14px] hover:underline text-blue-500" href="">Lihat Selengkapnya</a></p>
                </div>
            </div>
            <div
                class="_total-pengguna-daftar-tahun-ini flex flex-col justify-between w-full h-auto bg-white rounded-[20px] p-4">
                <div class="_header">
                    <p class="text-[18px] font-medium text-[#BAC3DC]">Total Pendaftar<br />Tahun ini</p>
                </div>
                <div class="_body">
                    <p class="text-[28px] font-bold">1297 User</p>
                </div>
                <div class="_footer">
                    <p class="text-[14px]">Total User yang mendaftar tahun ini adalah <b>109 User</b>.</p>
                    <p><a class="text-[14px] hover:underline text-blue-500" href="">Lihat Selengkapnya</a></p>
                </div>
            </div>
        </div>
        <div class="_data-pengguna w-full grid grid-cols-[2fr_1fr] gap-4">
            <div class="_component-list-data-filter w-full flex flex-col gap-4">
                <div class="_component-filter-search flex gap-4 items-center">
                    <div class="_filter">
                        <div class="flex items-center justify-center">
                            <div class="relative inline-block text-left">
                                <button id="dropdown-button"
                                    class="flex items-center gap-[5px] justify-center w-full px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                                    <i class="mt-[2px] text-[14px] fi fi-rr-settings-sliders"></i>
                                    <p class="text-[14px]">Filter</p>
                                </button>
                                <div id="dropdown-menu"
                                    class="origin-top-right z-10 absolute hidden right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-2 p-2" role="menu" aria-orientation="vertical"
                                        aria-labelledby="dropdown-button">
                                        <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="light"
                                                width="18px" class="mr-2">
                                                <path
                                                    d="M19 9.199h-.98c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799H19c.552 0 1-.357 1-.799 0-.441-.449-.801-1-.801zM10 4.5A5.483 5.483 0 0 0 4.5 10c0 3.051 2.449 5.5 5.5 5.5 3.05 0 5.5-2.449 5.5-5.5S13.049 4.5 10 4.5zm0 9.5c-2.211 0-4-1.791-4-4 0-2.211 1.789-4 4-4a4 4 0 0 1 0 8zm-7-4c0-.441-.449-.801-1-.801H1c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799h1c.551 0 1-.358 1-.799zm7-7c.441 0 .799-.447.799-1V1c0-.553-.358-1-.799-1-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1zm0 14c-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1 .441 0 .799-.447.799-1v-1c0-.553-.358-1-.799-1zm7.365-13.234c.391-.391.454-.961.142-1.273s-.883-.248-1.272.143l-.7.699c-.391.391-.454.961-.142 1.273s.883.248 1.273-.143l.699-.699zM3.334 15.533l-.7.701c-.391.391-.454.959-.142 1.271s.883.25 1.272-.141l.7-.699c.391-.391.454-.961.142-1.274s-.883-.247-1.272.142zm.431-12.898c-.39-.391-.961-.455-1.273-.143s-.248.883.141 1.274l.7.699c.391.391.96.455 1.272.143s.249-.883-.141-1.273l-.699-.7zm11.769 14.031l.7.699c.391.391.96.453 1.272.143.312-.312.249-.883-.142-1.273l-.699-.699c-.391-.391-.961-.455-1.274-.143s-.248.882.143 1.273z">
                                                </path>
                                            </svg> Light
                                        </a>
                                        <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="moon"
                                                width="18px" class="mr-2">
                                                <path
                                                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z">
                                                </path>
                                            </svg> Dark
                                        </a>
                                        <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="mr-2"
                                                viewBox="0 0 32 32" id="desktop">
                                                <path
                                                    d="M30 2H2a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h9.998c-.004 1.446-.062 3.324-.61 4h-.404A.992.992 0 0 0 10 29c0 .552.44 1 .984 1h10.03A.992.992 0 0 0 22 29c0-.552-.44-1-.984-1h-.404c-.55-.676-.606-2.554-.61-4H30a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM14 24l-.002.004L14 24zm4.002.004L18 24h.002v.004zM30 20H2V4h28v16z">
                                                </path>
                                            </svg> System
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="_divider w-[2px] h-[28px] bg-white rounded-full"></div>
                    <div class="_search">
                        <form class="form">
                            <label for="search" class="bg-white  rounded-full">
                                <input class="input" type="text" required="" placeholder="Cari kata" id="search">
                                <div class="fancy-bg"></div>
                                <div class="search">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"
                                        class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
                                        <g>
                                            <path
                                                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <button class="close-btn" type="reset">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </label>
                        </form>
                    </div>
                </div>
                <div class="_component-category w-full flex gap-4 flex-wrap">
                    <p class="cursor-pointer text-[14px] font-medium px-4 py-2 hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white gradient-1 text-white rounded-full">Pengguna Baru</p>
                    <p class="cursor-pointer text-[14px] px-4 py-2 font-medium hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white bg-white rounded-full">Tidak Aktif 1 Bulan</p>
                    <p class="cursor-pointer text-[14px] px-4 py-2 font-medium hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white bg-white rounded-full">Delete Acoount</p>
                    <p class="cursor-pointer text-[14px] px-4 py-2 font-medium hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white bg-white rounded-full">Pengguna Nonaktif</p>
                </div>
                <div class="_component-list-data w-full bg-white rounded-[20px] pl-4 pr-4 pt-4">
                    <div class="_wrapper-card flex flex-col gap-2 max-h-[500px] overflow-y-auto p-2">
                        <p class="text-[16px] font-medium">Total Data : 176 Users</p>
                        @for ($i = 0; $i < 10; $i++)
                        <div class="_card flex p-2 group rounded-[20px] cursor-pointer hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white gap-4 justify-between items-center">
                            <div class="_image-name-kota flex gap-2 items-center">
                                <div class="_image">
                                    <img class="object-cover w-[70px] h-[70px] rounded-[15px]" src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                </div>
                                <div class="_name-kota flex flex-col gap-1">
                                    <div class="_name-kota">
                                        <p class="text-[16px] font-medium">Agung kurniawan</p>
                                        <p class="text-[14px]">Kota Banyuwangi</p>
                                    </div>
                                    <p class="text-[12px] group-hover:text-black font-medium w-fit px-2 py-1 rounded-full bg-[#EFF2F7]">Customer</p>
                                </div>
                            </div>
                            <div class="_icon-more">
                                <p><i class="text-[20px] fi fi-rr-angle-small-right"></i></p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="_component-list-customer-sedang-aktif-sedang-sewa w-full h-full">
                <div class="_sub-container w-full grid grid-cols-1 gap-4 sticky top-4">
                    <div class="_sedang-aktif bg-white w-full h-[250px] overflow-hidden max-h-[250px] pl-4 pr-4 pt-4 rounded-[20px]">
                        <h1 class="text-[14px] font-medium">Sedang Aktif</h1>
                        <p class="text-[12px]"><b>164</b> Users sedang beraktifitas</p>
                        <div class="_card-wrapper overflow-y-scroll max-h-[180px]">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="_card flex p-2 group rounded-[20px] cursor-pointer hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white gap-4 justify-between items-center">
                                <div class="_image-name-kota flex gap-2 items-center">
                                    <div class="_image">
                                        <img class="object-cover w-[70px] h-[70px] rounded-[15px]" src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                    </div>
                                    <div class="_name-kota flex flex-col gap-1">
                                        <div class="_name-kota">
                                            <p class="text-[16px] font-medium">Agung kurniawan</p>
                                            <p class="text-[14px]">Kota Banyuwangi</p>
                                        </div>
                                        <p class="text-[12px] group-hover:text-black font-medium w-fit px-2 py-1 rounded-full bg-[#EFF2F7]">Customer</p>
                                    </div>
                                </div>
                                <div class="_icon-more">
                                    <p><i class="text-[20px] fi fi-rr-angle-small-right"></i></p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="_sedang-sewa bg-white w-full h-[300px] overflow-hidden max-h-[300px] pl-4 pr-4 pt-4 rounded-[20px]">
                        <h1 class="text-[14px] font-medium">Sedang Sewa</h1>
                        <p class="text-[12px]"><b>164</b> Users sedang transaksi sewa.</p>
                        <div class="_card-wrapper overflow-y-scroll p-2 max-h-[250px]">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="_card flex p-2 group rounded-[20px] cursor-pointer hover:bg-gradient-to-bl from-[#B381F4] to-[#5038ED] hover:text-white gap-4 justify-between items-center">
                                <div class="_image-name-kota flex gap-2 items-center">
                                    <div class="_image">
                                        <img class="object-cover w-[70px] h-[70px] rounded-[15px]" src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                    </div>
                                    <div class="_name-kota flex flex-col gap-1">
                                        <div class="_name-kota">
                                            <p class="text-[16px] font-medium">Agung kurniawan</p>
                                            <p class="text-[14px]">Kota Banyuwangi</p>
                                        </div>
                                        <p class="text-[12px] group-hover:text-black font-medium w-fit px-2 py-1 rounded-full bg-[#EFF2F7]">Customer</p>
                                    </div>
                                </div>
                                <div class="_icon-more">
                                    <p><i class="text-[20px] fi fi-rr-angle-small-right"></i></p>
                                </div>
                            </div>
                            @endfor
                            <div class="w-full h-[10px]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
@endsection
