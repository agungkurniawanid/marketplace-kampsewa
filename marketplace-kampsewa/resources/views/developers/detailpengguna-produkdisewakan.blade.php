@extends('layouts.developers.ly-dashboard')
@section('content')
    <div class="_container p-[30px] flex flex-col gap-8">
        <div class="_header flex gap-4 items-center">
            <div class="_btn-back w-fit"><a href="{{ route('detail-pengguna.index', ['fullname' => $name]) }}"
                class="flex items-center gap-2 px-4 py-2 gradient-1 text-white rounded-[10px]">
                <p class="mt-1"><i class="text-[18px] fi fi-rr-arrow-small-left"></i></p>
                <p class="text-[14px] font-medium">Kembali</p>
            </a></div>
            <div class="_title">
                <h1 class="text-[20px]">Barang Disewakan Oleh {{ $name }}</h1>
                <p class="text-[14px]">Menampilkan semua barang dengan semua kategori yang disediakan atau disewakan oleh user
                    <b>{{ $name }}</b>.
                </p>
            </div>
        </div>
        <div class="_action flex items-center w-full justify-between">
            <div class="_checkall-delete-filter flex gap-4 items-center">
                <div class="_checkall items-center flex gap-2">
                    {{-- todo checkbox komponent --}}
                    <div class="_checkbox">
                        <div class="inline-flex items-center">
                            <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="checkbox">
                                <input type="checkbox"
                                    class="before:content[''] peer relative w-7 h-7 cursor-pointer appearance-none rounded-lg border-2 border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-[#5038ED] checked:bg-[#5038ED] checked:before:bg-gray-900 hover:before:opacity-10"
                                    id="checkbox" />
                                <span
                                    class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="_delete-all">
                        <a href="" class="text-[14px] py-2 bg-[#FEF2F2] px-4 rounded-[7px] text-[#EF4444]">Hapus
                            Semua</a>
                    </div>
                </div>
                <div class="_divider w-[2px] bg-[#E5E7EB] h-[20px] rounded-full"></div>
                <div class="_filter-category">
                    <form action="" class="flex gap-2 items-center">
                        <label class="text-[14px] font-medium" for="filter-category">Filter Produk :</label>
                        <select class="border border-[#E5E7EB] rounded-[7px] px-4 py-2 text-[14px] font-medium"
                            name="filter-category" id="filter-category">
                            <option value="Semua Barang">Semua Barang</option>
                            <option value="Tenda">Tenda</option>
                            <option value="Kursi">Kursi</option>
                            <option value="Meja">Meja</option>
                            <option value="Sleeping Bag">Sleeping Bag</option>
                            <option value="Keranjang">Keranjang</option>
                            <option value="Kompor">Kompor</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="_search-bar w-1/4">
                <form action="" class="w-full px-4 py-2 rounded-full shadow-box-shadow-36 flex items-center">
                    <div class="_input w-full">
                        <input type="text" class="w-full focus:outline-none text-[14px] font-medium"
                            placeholder="Cari Barang" autocomplete="on">
                    </div>
                    <div class="_search-icon">
                        <p class="mt-1"><i class="fi fi-rr-search"></i></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="_barang w-full grid grid-cols-5 gap-4">
            @for ($i = 0; $i < 15; $i++)
                <div
                    class="_card-design flex flex-col justify-between gap-1 rounded-[10px] shadow-box-shadow-8 overflow-hidden">
                    <div class="_header">
                        <a
                            href="{{ route('detail-pengguna.detail-produk-disewakan', ['fullname' => $name, 'namaproduk' => 'TangPlecut']) }}">
                            <div class="_img relative group">
                                <div
                                    class="_hover-detail flex items-center justify-between w-full h-fit bottom-0 py-4 px-4 bg-gradient-to-t from-[#000000] to-[rgba(0, 0, 0, 0)] rounded-br-[10px] rounded-bl-[10px] absolute opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p class="text-[14px] font-medium text-white">Lihat Detail</p>
                                    <p
                                        class="text-[18px] text-black w-[30px] h-[30px] rounded-full flex justify-center items-center bg-white">
                                        <i class="mt-1 fi fi-rr-angle-small-right"></i>
                                    </p>
                                </div>
                                <img class="object-cover w-full h-[180px]"
                                    src="{{ asset('assets/image/customers/produk/shopping.webp') }}" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="_body p-2">
                        <p class="text-[12px] font-medium line-clamp-2"><a
                                href="{{ route('detail-pengguna.detail-produk-disewakan', ['fullname' => $name, 'namaproduk' => 'TangPlecut']) }}"
                                class="hover:underline hover:text-blue-600">Tas kamping muat banyak barang bawaaan</a></p>
                        <p class="mt-1 text-[14px]"><b>Rp. 5.000</b>/Hari</p>
                    </div>
                    <div class="_footer p-2">
                        <hr>
                        <div class="_component flex justify-between items-center">
                            {{-- todo checkbox komponent --}}
                            <div class="_checkbox">
                                <div class="inline-flex items-center">
                                    <label class="relative flex items-center rounded-full cursor-pointer"
                                        htmlFor="checkbox">
                                        <input type="checkbox"
                                            class="before:content[''] peer relative w-6 h-6 cursor-pointer appearance-none rounded-lg border-2 border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-[#5038ED] checked:bg-[#5038ED] checked:before:bg-gray-900 hover:before:opacity-10"
                                            id="checkbox-product-item" />
                                        <span
                                            class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <p class="text-[12px] font-medium">Check atau</p>
                            <div class="_delete-buttton">
                                <a href=""
                                    class="text-[12px] font-medium px-2 py-1 rounded-[5px] bg-[#FEF2F2] text-[#EB5757]">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
