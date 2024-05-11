@extends('layouts.developers.ly-dashboard')
@section('content')

{{-- todo modals tambah customer --}}
@include('components.modals.add-customer')

    <div class="_container p-[20px] w-full">

        {{-- todo judul --}}
        <div class="_wrapper-judul mb-6">

            {{-- todo judul --}}
            <h1 class="text-[24px] font-bold text-[#19191B] capitalize">Data List Pengguna</h1>
        </div>

        {{-- todo wrapper total search filter --}}
        <div class="flex w-full justify-between items-center mb-4">

            {{-- todo total users --}}
            <div class="_total">
                <p class="text-[#19191b] text-[14px] font-bold">1.235.134 Customer</p>
            </div>

            {{-- todo wrapper search filter --}}
            <div class="_search-filter flex gap-[20px]">
                {{-- todo search --}}
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

                {{-- todo untuk tombol tambah data --}}
                <div class="_btn-tambah-data">
                    <button onclick="modalHandler(true)" class="px-4 py-2 gradient-1 cursor-pointer text-white rounded-full">
                        <div class="_icon-plus"></div>
                        <span>Tambah Customer</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- todo wrapper card --}}
        <div class="_wrapper-card flex mb-4 flex-col gap-3">
            {{-- todo card list --}}
            @foreach ($data as $item)
                <div
                    class="_card-pengguna gap-4 hover:shadow-box-shadow-7 grid grid-cols-4 w-full justify-between items-center bg-white rounded-[20px] p-[20px]">
                    <div class="_photo-name-address flex items-center gap-[10px]">
                        <div class="_photo relative overflow-hidden w-[60px] h-[60px] rounded-[20px]">
                            <img class="w-full object-cover" src="{{ asset('assets/image/jokowi.jpg') }}" alt="">
                        </div>
                        <div class="_name-address">
                            <div class="_name font-bold text-[#19191b]">{{ $item['nama'] }}</div>
                            <div class="_address text-gray-400 font-normal text-[12px]">{{ $item['alamat'] }}</div>
                            <div class="_level w-[70%] mt-2">
                                <p class="bg-[#FDEAEE] text-[10px] font-bold rounded-full text-[#F5325C] text-center p-1">
                                    {{ $item['status'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="_number-createdat">
                        <div class="_number flex flex-col">
                            <span class="text-[19191b] font-medium">{{ $item['status'] }}</span>
                            <span class="text-[12px] font-medium text-gray-400">{{ $item['nomor'] }}</span>
                        </div>
                        <div class="_createdat text-[12px] mt-2">
                            <span class="font-medium text-[#19191B]">Bergabung:</span>
                            <span class="font-normal text-gray-400 border-dashed border-b-2">{{ $item['bergabung'] }}</span>
                        </div>
                    </div>
                    <div class="_total-product">
                        <p class="w-[80%] font-medium"><i class="mt-1 fi fi-rr-box-open"></i> {{ $item['total-product'] }}
                            Total Product Disewakan
                        </p>
                        <p class="text-[12px] text-gray-400 font-medium mt-1"><a href=""><u>Lihat semua
                                    product</u></a></p>
                    </div>
                    <div class="_gender-iconmore flex justify-end w-full items-center gap-8">
                        <div
                            class="_gender flex p-3 rounded-r-full rounded-bl-full border-solid border-[2px] items-center gap-2">
                            <div class="_circle w-[12px] h-[12px] rounded-full bg-[#12A4ED]"></div>
                            <p class="text-[14px] font-medium text-[#19191b]">{{ $item['gender'] }}</p>
                        </div>
                        <div class="_moreicon btn-more relative cursor-pointer">
                            <div class="relative"><i class="text-[20px] text-gray-400 fi fi-rr-rectangle-list"></i>
                            </div>
                            {{-- Dropdown menu --}}
                            <div class="dropdown-menu right-0 z-10 hidden absolute bg-white shadow-md rounded-md py-2 px-3">
                                {{-- Dropdown items --}}
                                <a href="{{ route('detail-pengguna.index', ['fullname' => $item['nama']]) }}" class="hover:text-[#12A4ED] dropdown-item flex gap-1 py-2">
                                    <span class="mt-[0.15rem]"><i class="fi fi-rr-folder-open"></i></span>
                                    <span>Detail</span>
                                </a>
                                {{-- <a href="#" class="hover:text-[#12A4ED] dropdown-item flex gap-1 py-2">
                                    <span class="mt-[0.15rem]"><i class="fi fi-rr-edit"></i></span>
                                    <span>Edit</span></a> --}}
                                <a href="#" class="hover:text-[#12A4ED] dropdown-item flex gap-1 py-2">
                                    <span class="mt-[0.15rem]"><i class="fi fi-rr-trash"></i></span>
                                    <span>Delete</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="_pagination">
            <div class="w-full flex justify-center pt-1 gap-2">
                <p><a href=""
                        class="text-[12px] font-bold text-white gradient-1 px-4 py-2 rounded-[5px]">Sebelumnya</a>
                </p>
                <p><a href=""
                        class="text-[12px] font-bold text-black bg-white hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">1</a>
                </p>
                <p><a href=""
                        class="text-[12px] font-bold text-black bg-white hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">2</a>
                </p>
                <p><a href=""
                        class="text-[12px] font-bold text-black bg-white hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">...</a>
                </p>
                <p><a href="" class="text-[12px] font-bold text-white gradient-1 px-4 py-2 rounded-[5px]">Next</a>
                </p>
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
    <script>
        // Get all btn-more elements
        const btnsMore = document.querySelectorAll('.btn-more');

        // Iterate through each btn-more and add click event listener
        btnsMore.forEach(btnMore => {
            btnMore.addEventListener('click', function() {
                // Toggle the 'hidden' class of the dropdown-menu
                const dropdownMenu = this.querySelector('.dropdown-menu');
                dropdownMenu.classList.toggle('hidden');
            });
        });

        // Close dropdown when clicking outside of it
        window.addEventListener('click', function(event) {
            btnsMore.forEach(btnMore => {
                if (!btnMore.contains(event.target)) {
                    const dropdownMenu = btnMore.querySelector('.dropdown-menu');
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
    <script>
        let modal = document.getElementById("modal");

        // Fungsi untuk menampilkan atau menyembunyikan modal
        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }

        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>
@endsection
