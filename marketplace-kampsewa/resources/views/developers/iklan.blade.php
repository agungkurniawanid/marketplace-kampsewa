@extends('layouts.developers.ly-dashboard')
@section('content')
    <div class="_container grid grid-cols-[2fr_1fr] gap-4 w-full p-8">
        <div class="_grid-1 flex flex-col gap-4 w-full">
            <div class="_three-card-information w-full grid grid-cols-3 gap-4">
                <div
                    class="_card-total-advert-transaction w-full rounded-[20px] cursor-pointer hover:shadow-box-shadow-7 grid items-center grid-cols-2 gap-2 p-2 bg-white">
                    <div class="_image"><img class="w-full object-cover scale-x-[-1]"
                            src="{{ asset('assets/vector/active-male-specialist-working-in-support-service.png') }}"
                            alt=""></div>
                    <div class="_section">
                        <div class="_header">
                            <h1 class="text-[14px] text-black">Total Transaksi</h1>
                        </div>
                        <div class="_body">
                            <p class="text-[28px] font-bold">1297</p>
                        </div>
                        <div class="_footer"></div>
                    </div>
                </div>
                <div
                    class="_card-total-waiting-inline-advert w-full rounded-[20px] cursor-pointer hover:shadow-box-shadow-7 grid items-center grid-cols-2 gap-2 p-2 bg-white">
                    <div class="_image"><img class="w-full object-cover"
                            src="{{ asset('assets/vector/active-time-management-using-clock-and-calendar.png') }}"
                            alt=""></div>
                    <div class="_section">
                        <div class="_header">
                            <h1 class="text-[14px] text-black">Total Antrian Iklan</h1>
                        </div>
                        <div class="_body">
                            <p class="text-[28px] font-bold">1297</p>
                        </div>
                        <div class="_footer"></div>
                    </div>
                </div>
                <div
                    class="_card-total-transaction-cancelled w-full rounded-[20px] cursor-pointer hover:shadow-box-shadow-7 grid items-center grid-cols-2 gap-2 p-2 bg-white">
                    <div class="_image"><img class="w-full object-cover scale-x-[-1]"
                            src="{{ asset('assets/vector/active-man-interacting-with-graphics-in-vr-glasses.png') }}"
                            alt=""></div>
                    <div class="_section">
                        <div class="_header">
                            <h1 class="text-[14px] text-black">Total Dibatalkan</h1>
                        </div>
                        <div class="_body">
                            <p class="text-[28px] font-bold">1297</p>
                        </div>
                        <div class="_footer"></div>
                    </div>
                </div>
            </div>
            <div id="scrollableDiv"
                class="_waiting-inline w-full h-[500px] px-4 pt-4 bg-white rounded-[20px] flex flex-col gap-4">
                <h1 class="text-[18px] font-medium">Antrian Menunggu Giliran</h1>
                <div class="_totaldata-searchfilter w-full flex items-center justify-between">
                    <div class="_total-data">
                        <p class="text-[14px] font-medium">2475 Data</p>
                    </div>
                    <div class="_search-filter flex gap-2 items-center">
                        {{-- todo search --}}
                        <div class="_search">
                            <div class="_search">
                                <form class="form">
                                    <label for="search">
                                        <input class="input" type="text" required="" placeholder="Cari kata"
                                            id="search">
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
                        <div class="_filter">
                            {{-- todo filter --}}
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        id="light" width="18px" class="mr-2">
                                                        <path
                                                            d="M19 9.199h-.98c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799H19c.552 0 1-.357 1-.799 0-.441-.449-.801-1-.801zM10 4.5A5.483 5.483 0 0 0 4.5 10c0 3.051 2.449 5.5 5.5 5.5 3.05 0 5.5-2.449 5.5-5.5S13.049 4.5 10 4.5zm0 9.5c-2.211 0-4-1.791-4-4 0-2.211 1.789-4 4-4a4 4 0 0 1 0 8zm-7-4c0-.441-.449-.801-1-.801H1c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799h1c.551 0 1-.358 1-.799zm7-7c.441 0 .799-.447.799-1V1c0-.553-.358-1-.799-1-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1zm0 14c-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1 .441 0 .799-.447.799-1v-1c0-.553-.358-1-.799-1zm7.365-13.234c.391-.391.454-.961.142-1.273s-.883-.248-1.272.143l-.7.699c-.391.391-.454.961-.142 1.273s.883.248 1.273-.143l.699-.699zM3.334 15.533l-.7.701c-.391.391-.454.959-.142 1.271s.883.25 1.272-.141l.7-.699c.391-.391.454-.961.142-1.274s-.883-.247-1.272.142zm.431-12.898c-.39-.391-.961-.455-1.273-.143s-.248.883.141 1.274l.7.699c.391.391.96.455 1.272.143s.249-.883-.141-1.273l-.699-.7zm11.769 14.031l.7.699c.391.391.96.453 1.272.143.312-.312.249-.883-.142-1.273l-.699-.699c-.391-.391-.961-.455-1.274-.143s-.248.882.143 1.273z">
                                                        </path>
                                                    </svg> Light
                                                </a>
                                                <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                                    role="menuitem">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        id="moon" width="18px" class="mr-2">
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
                        </div>
                    </div>
                </div>
                <div id="dataItems" class="_data-item w-full h-full flex flex-col gap-2 p-2 overflow-scroll">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="_card items-center p-2 rounded-[20px] hover:bg-[#F2F5FD] w-full flex justify-between">
                            <div class="_nomor">
                                <p
                                    class="flex items-center justify-center text-[12px] font-bold w-[30px] h-[30px] rounded-full p-2 bg-[#EFF2F7]">
                                    {{ $i + 1 }}</p>
                            </div>
                            <div class="_image-name flex items-center gap-2">
                                <img class="w-[40px] h-[40px] rounded-[10px] object-cover"
                                    src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                <p class="text-[12px] font-medium">Agung Kurniawan</p>
                            </div>
                            <div class="_judul-iklan-status-iklan">
                                <p class="text-[12px] font-medium max-w-[200px] line-clamp-2">Promo 50% Tenda Adidas</p>
                                <p class="text-[10px] font-bold w-fit rounded-full py-1 px-2 bg-[#FEF2F2] text-[#F03E3E]">
                                    Menunggu</p>
                            </div>
                            <div class="_tanggalmulai">
                                <p class="text-[12px] font-medium p-2 bg-[#F0FDF4] text-[#34D399] rounded-full">12 Januari
                                    2022</p>
                            </div>
                            <div class="_action flex items-center gap-2">
                                <div class="_detail"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-pencil-fill"></i></a></div>
                                <div class="_delete"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-trash-fill"></i></a></div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div
                class="_advert-history-transaction w-full h-[500px] px-4 pt-4 bg-white rounded-[20px] flex flex-col gap-4">
                <h1 class="text-[18px] font-medium">Riwayat Transaksi Iklan</h1>
                <div class="_totaldata-searchfilter w-full flex items-center justify-between">
                    <div class="_total-data">
                        <p class="text-[14px] font-medium">2475 Data</p>
                    </div>
                    <div class="_search-filter flex gap-2 items-center">
                        {{-- todo search --}}
                        <div class="_search">
                            <div class="_search">
                                <form class="form">
                                    <label for="search">
                                        <input class="input" type="text" required="" placeholder="Cari kata"
                                            id="search">
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
                        <div class="_print-report">
                            <button class="px-4 py-2 flex items-center gap-1 shadow-box-shadow-8 rounded-full">
                                <p class="mt-[2px]"><i class="text-[14px] mt-1 fi fi-rr-print"></i></p>
                                <p class="text-[14px]">Print</p>
                            </button>
                        </div>
                        <div class="_filter">
                            {{-- todo filter --}}
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        id="light" width="18px" class="mr-2">
                                                        <path
                                                            d="M19 9.199h-.98c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799H19c.552 0 1-.357 1-.799 0-.441-.449-.801-1-.801zM10 4.5A5.483 5.483 0 0 0 4.5 10c0 3.051 2.449 5.5 5.5 5.5 3.05 0 5.5-2.449 5.5-5.5S13.049 4.5 10 4.5zm0 9.5c-2.211 0-4-1.791-4-4 0-2.211 1.789-4 4-4a4 4 0 0 1 0 8zm-7-4c0-.441-.449-.801-1-.801H1c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799h1c.551 0 1-.358 1-.799zm7-7c.441 0 .799-.447.799-1V1c0-.553-.358-1-.799-1-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1zm0 14c-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1 .441 0 .799-.447.799-1v-1c0-.553-.358-1-.799-1zm7.365-13.234c.391-.391.454-.961.142-1.273s-.883-.248-1.272.143l-.7.699c-.391.391-.454.961-.142 1.273s.883.248 1.273-.143l.699-.699zM3.334 15.533l-.7.701c-.391.391-.454.959-.142 1.271s.883.25 1.272-.141l.7-.699c.391-.391.454-.961.142-1.274s-.883-.247-1.272.142zm.431-12.898c-.39-.391-.961-.455-1.273-.143s-.248.883.141 1.274l.7.699c.391.391.96.455 1.272.143s.249-.883-.141-1.273l-.699-.7zm11.769 14.031l.7.699c.391.391.96.453 1.272.143.312-.312.249-.883-.142-1.273l-.699-.699c-.391-.391-.961-.455-1.274-.143s-.248.882.143 1.273z">
                                                        </path>
                                                    </svg> Light
                                                </a>
                                                <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                                    role="menuitem">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        id="moon" width="18px" class="mr-2">
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
                        </div>
                    </div>
                </div>
                <div id="dataItems" class="_data-item w-full h-full flex flex-col gap-2 p-2 overflow-scroll">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="_card items-center p-2 rounded-[20px] hover:bg-[#F2F5FD] w-full flex justify-between">
                            <div class="_nomor">
                                <p
                                    class="flex items-center justify-center text-[12px] font-bold w-[30px] h-[30px] rounded-full p-2 bg-[#EFF2F7]">
                                    {{ $i + 1 }}</p>
                            </div>
                            <div class="_image-name flex items-center gap-2">
                                <img class="w-[40px] h-[40px] rounded-[10px] object-cover"
                                    src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                <p class="text-[12px] font-medium">Agung Kurniawan</p>
                            </div>
                            <div class="_judul-iklan-status-iklan">
                                <p class="text-[12px] font-medium max-w-[200px] line-clamp-2">Promo 50% Tenda Adidas</p>
                                <p class="text-[10px] font-bold w-fit rounded-full py-1 px-2 text-[#34D399] bg-[#F0FDF4]">
                                    Selesai</p>
                            </div>
                            <div class="_tanggalmulai">
                                <p class="text-[12px] font-medium p-2  text-[#F03E3E] bg-[#FEF2F2]  rounded-full">12
                                    Januari
                                    2022</p>
                            </div>
                            <div class="_action flex items-center gap-2">
                                <div class="_detail"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-pencil-fill"></i></a></div>
                                <div class="_delete"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-trash-fill"></i></a></div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div
                class="_advert-transaction-cancelled w-full h-[500px] px-4 pt-4 bg-white rounded-[20px] flex flex-col gap-4">
                <h1 class="text-[18px] font-medium">Iklan Dibatalkan</h1>
                <div class="_totaldata-searchfilter w-full flex items-center justify-between">
                    <div class="_total-data">
                        <p class="text-[14px] font-medium">2475 Data</p>
                    </div>
                    <div class="_search-filter flex gap-2 items-center">
                        {{-- todo search --}}
                        <div class="_search">
                            <div class="_search">
                                <form class="form">
                                    <label for="search">
                                        <input class="input" type="text" required="" placeholder="Cari kata"
                                            id="search">
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
                        <div class="_filter">
                            {{-- todo filter --}}
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        id="light" width="18px" class="mr-2">
                                                        <path
                                                            d="M19 9.199h-.98c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799H19c.552 0 1-.357 1-.799 0-.441-.449-.801-1-.801zM10 4.5A5.483 5.483 0 0 0 4.5 10c0 3.051 2.449 5.5 5.5 5.5 3.05 0 5.5-2.449 5.5-5.5S13.049 4.5 10 4.5zm0 9.5c-2.211 0-4-1.791-4-4 0-2.211 1.789-4 4-4a4 4 0 0 1 0 8zm-7-4c0-.441-.449-.801-1-.801H1c-.553 0-1 .359-1 .801 0 .441.447.799 1 .799h1c.551 0 1-.358 1-.799zm7-7c.441 0 .799-.447.799-1V1c0-.553-.358-1-.799-1-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1zm0 14c-.442 0-.801.447-.801 1v1c0 .553.359 1 .801 1 .441 0 .799-.447.799-1v-1c0-.553-.358-1-.799-1zm7.365-13.234c.391-.391.454-.961.142-1.273s-.883-.248-1.272.143l-.7.699c-.391.391-.454.961-.142 1.273s.883.248 1.273-.143l.699-.699zM3.334 15.533l-.7.701c-.391.391-.454.959-.142 1.271s.883.25 1.272-.141l.7-.699c.391-.391.454-.961.142-1.274s-.883-.247-1.272.142zm.431-12.898c-.39-.391-.961-.455-1.273-.143s-.248.883.141 1.274l.7.699c.391.391.96.455 1.272.143s.249-.883-.141-1.273l-.699-.7zm11.769 14.031l.7.699c.391.391.96.453 1.272.143.312-.312.249-.883-.142-1.273l-.699-.699c-.391-.391-.961-.455-1.274-.143s-.248.882.143 1.273z">
                                                        </path>
                                                    </svg> Light
                                                </a>
                                                <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                                                    role="menuitem">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        id="moon" width="18px" class="mr-2">
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
                        </div>
                    </div>
                </div>
                <div id="dataItems" class="_data-item w-full h-full flex flex-col gap-2 p-2 overflow-scroll">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="_card items-center p-2 rounded-[20px] hover:bg-[#F2F5FD] w-full flex justify-between">
                            <div class="_nomor">
                                <p
                                    class="flex items-center justify-center text-[12px] font-bold w-[30px] h-[30px] rounded-full p-2 bg-[#EFF2F7]">
                                    {{ $i + 1 }}</p>
                            </div>
                            <div class="_image-name flex items-center gap-2">
                                <img class="w-[40px] h-[40px] rounded-[10px] object-cover"
                                    src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}" alt="">
                                <p class="text-[12px] font-medium">Agung Kurniawan</p>
                            </div>
                            <div class="_judul-iklan-status-iklan">
                                <p class="text-[12px] font-medium max-w-[200px] line-clamp-2">Promo 50% Tenda Adidas</p>
                                <p class="text-[10px] font-bold w-fit rounded-full py-1 px-2 text-white gradient-1">
                                    Dibatalkan</p>
                            </div>
                            <div class="_tanggalmulai">
                                <p class="text-[12px] font-medium p-2  text-[#F03E3E] bg-[#FEF2F2]  rounded-full">12
                                    Januari
                                    2022</p>
                            </div>
                            <div class="_action flex items-center gap-2">
                                <div class="_detail"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-pencil-fill"></i></a></div>
                                <div class="_delete"><a href=""
                                        class="w-[30px] h-[30px] rounded-full items-center justify-center flex bg-[#EFF2F7] cursor-pointer"><i
                                            class="bi bi-trash-fill"></i></a></div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="_grid-2 w-full">
            <div id="ongoing-advert" class="_ongoing-advert sticky top-0 w-full h-screen">
                <div class="_sub-wrapper flex flex-col gap-4 bg-white rounded-[20px] w-full h-full p-4">
                    <div class="_title">
                        <p class="text-[18px] font-medium">Iklan Sedang Aktif</p>
                        <p class="text-[14px]"><b>10</b> Iklan Sedang Aktif saat ini.</p>
                    </div>
                    <div class="_divider w-full h-[2px] bg-[#E5E7EB]"></div>
                    <div class="_card-wrapper w-full h-full overflow-scroll p-2 flex flex-col gap-6">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="_card flex flex-col gap-2">
                                <a href="" class="group">
                                    <div class="_header relative w-full rounded-[20px] overflow-hidden">
                                        <div
                                        class="_hover-detail flex items-center justify-between w-full h-fit bottom-0 py-4 px-4 bg-gradient-to-t from-[#000000] to-[rgba(0, 0, 0, 0)] rounded-br-[10px] rounded-bl-[10px] absolute opacity-0 group-hover:opacity-100 transition duration-300">
                                        <p class="text-[14px] font-medium text-white">Lihat Detail</p>
                                        <p
                                            class="text-[18px] text-black w-[30px] h-[30px] rounded-full flex justify-center items-center bg-white">
                                            <i class="mt-1 fi fi-rr-angle-small-right"></i>
                                        </p>
                                    </div>
                                        <img class="w-full rounded-[20px] object-cover h-[200px]"
                                            src="{{ asset('assets/image/customers/advert/Banner Mua Ghế Massage _ PSD Tải xuống miễn phí - Pikbest.jpg') }}"
                                            alt=""></div>
                                    <div class="_body mt-2 flex flex-col gap-2">
                                        <div class="_judul-iklan">
                                            <p class="text-[16px] line-clamp-2 font-medium">Promo 50% Terbaru Tenda Dari
                                                Penyewaan
                                                Patrang Jaya dan Alat Berkualitas</p>
                                        </div>
                                        <div class="_user-status-iklan flex items-center justify-between w-full">
                                            <div class="_user flex items-center gap-2">
                                                <img class="w-[40px] h-[40px] rounded-full object-cover"
                                                    src="{{ asset('assets/image/developers/agung-kurniawan.jpg') }}"
                                                    alt="">
                                                <div class="_name-address">
                                                    <p class="text-[14px] font-medium">Agung Kurniawan</p>
                                                    <p class="text-[12px] font-medium text-[#6B7280]">Surabaya</p>
                                                </div>
                                            </div>
                                            <div class="_status-iklan">
                                                <p
                                                    class="py-2 px-4 text-center text-[12px] font-bold text-white gradient-1 rounded-full">
                                                    Aktif</p>
                                            </div>
                                        </div>
                                        <div class="_waktu-sewa">
                                            <span class="text-[12px] font-medium">Waktu Iklan Ditampilkan : </span>
                                            <span class="text-[12px] font-medium">3 Hari</span>
                                        </div>
                                        <div class="_start-finish w-full flex justify-between gap-2 items-center">
                                            <p
                                                class="text-[12px] font-bold p-2  text-[#F03E3E] bg-[#FEF2F2]  rounded-full">
                                                12 Januari 2024</p>
                                            <p class="text-[12px] font-medium">sampai</p>
                                            <p
                                                class="text-[12px] font-bold p-2  text-[#34D399] bg-[#ECFDF5]  rounded-full">
                                                15 Januari 2024</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onscroll = function() {
            stickyFunction()
        };

        var ongoingAdvert = document.getElementById("ongoing-advert");
        var sticky = ongoingAdvert.offsetTop;

        function stickyFunction() {
            if (window.pageYOffset >= sticky) {
                ongoingAdvert.classList.add("py-4");
                ongoingAdvert.classList.remove("py-0");
            } else {
                ongoingAdvert.classList.remove("py-4");
                ongoingAdvert.classList.add("py-0");
            }
        }
    </script>
@endsection
