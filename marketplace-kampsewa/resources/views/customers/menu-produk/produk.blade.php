{{-- ambil turunan design --}}
@extends('customers.menu-dashboard-cust.dashboard')
{{-- gunakan section dengan nama yang sesuai untuk custom content --}}
@section('customer-content')
    {{-- container utama pembungkus kontent utama --}}
    <div class="--container px-10 py-5 flex flex-col gap-8">
        {{-- heading dan deskripsi halaman --}}
        <div class="--wrapper-heading-wrapper-deskripsi-halaman">
            <h1 class="text-[24px] font-bold capitalize">Manajemen Produk Anda!</h1>
            <p class="text-[14px]">Halaman ini berisi data produk anda, anda bisa menambah, mengedit dan menghapus produk,
                melihat produk yang
                sedang disewa, menampilkan berdasarkan produk terlaris disewa, harga sewa termurah - termahal, produk
                terbaru
                dan terlama sekaligus bisa mencari berdasarkan kosakata nama produk dan harga. Jika anda masih bingung lihat
                menu cara penggunaan fitur pada menu <a href=""
                    class="text-blue-700 underline hover:underline font-bold">Dokumentasi</a>.</p>
        </div>

        {{-- wrapper navigation item menu --}}
        <div class="--wrapper-navigation-menu w-full">
            <ul class="flex items-center gap-2">
                <li><a class="{{ $title == 'Produk Menu | KampSewa' ? 'bg-[#F8F7F4] font-medium' : '' }} hover:font-medium hover:bg-[#F8F7F4] hover:text-[#0F172A] text-[14px] px-4 py-2 rounded-full"
                        href="{{ route('menu-produk.index') }}">Semua Produk</a></li>
                <li><a class="text-[14px] hover:font-medium px-4 py-2 rounded-full hover:bg-[#F8F7F4] hover:text-[#0F172A]"
                        href="{{ route('menu-produk.kelola-produk') }}">Kelola Produk</a></li>
                <li><a class="text-[14px] hover:font-medium px-4 py-2 rounded-full hover:bg-[#F8F7F4] hover:text-[#0F172A]"
                        href="{{ route('menu-produk.sedang-disewa') }}">Sedang Disewa</a></li>
            </ul>
        </div>

        <hr>

        {{-- pembungkus kontent filter dan list produk --}}
        <div class="--wrapper-filter-wrapper-list-product w-full flex gap-4 items-start h-auto">
            {{-- filter --}}
            <div class="--wrapper-filter max-w-[500px] sticky top-4 flex flex-col gap-4">
                <div class="--search flex flex-col gap-2">
                    <p class="text-[14px] font-medium">Pencarian Produk:</p>
                    <form action="">
                        <div class="relative w-full mx-auto">
                            <input class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="search" placeholder="Search">
                        </div>
                    </form>
                </div>

                {{-- filter category --}}
                <div class="--search flex flex-col gap-2">
                    <p class="text-[14px] font-medium">Pilih Category:</p>
                    <form class="w-full mx-auto" action="" method="">
                        <div class="custom-select-wrapper">
                            <select id="countries" class="custom-select">
                                <option selected>Semua</option>
                                <option value="tenda">Tenda</option>
                                <option value="pemasak">Alat Masak</option>
                                <option value="sepatu">Sepatu</option>
                                <option value="meja">Meja</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            {{-- divider --}}
            <div class="w-[3px] h-screen bg-[#19191b] sticky top-4"></div>

            {{-- list produk --}}
            <div class="--wrapper-produk w-full flex flex-col gap-4">
                <div class="w-full flex items-center justify-between">
                    <p class="text-[14px]">12 Hasil Produk</p>
                    <form action="">
                        <select name="filter" id="filter" class="focus:outline-none text-[14px]">
                            <option value="">Terbaru</option>
                            <option value="">Terlama</option>
                            <option value="">Harga Termahal</option>
                            <option value="">Harga Termurah</option>
                        </select>
                    </form>
                </div>
                <div class="--wrapper-card w-full">
                    <div class="--card-design grid grid-cols-4 gap-4">
                        @for ($i = 1; $i <= 20; $i++)
                        <a href="" class="hover:text-black group">
                            <div class="--card-item flex flex-col gap-2">
                                <div class="--header">
                                    <img class="w-[250px] h-[250px] object-cover rounded-[30px]" src="{{ asset('assets/image/customers/produk/foldingcamptableleadpic.jpg') }}" alt="">
                                </div>
                                <div class="--body">
                                    <p class="capitalize text-[18px] font-medium line-clamp-1 group-hover:underline">folding camp table lead Hard Tools</p>
                                    <p class="text-[14px] text-gray-400"><i class="bi bi-box-fill"></i> Stok : 12</p>
                                    <div class="flex items-center gap-2 mt-2">
                                        <p class="text-[12px] font-medium bg-[#F6F7FF] text-[#8DBCFF] px-2 py-1 rounded-[5px]">Ransel</p>
                                        <p class="text-[12px] font-medium bg-[#FEF2EC] text-[#EF9866] px-2 py-1 rounded-[5px]">Rp. 15.000/Hari</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endfor
                    </div>
                </div>
                <div class="w-full flex justify-center pt-1 gap-2 mt-2">
                    <p><a href=""
                            class="text-[12px] font-bold text-white gradient-1 px-4 py-2 rounded-[5px]">Sebelumnya</a></p>
                    <p><a href=""
                            class="text-[12px] font-bold text-black hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">1</a>
                    </p>
                    <p><a href=""
                            class="text-[12px] font-bold text-black hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">2</a>
                    </p>
                    <p><a href=""
                            class="text-[12px] font-bold text-black hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">3</a>
                    </p>
                    <p><a href=""
                            class="text-[12px] font-bold text-black hover:bg-gray-100 shadow-box-shadow-8 px-4 py-2 rounded-[5px]">4</a>
                    </p>
                    <p><a href="" class="text-[12px] font-bold text-white gradient-1 px-4 py-2 rounded-[5px]">Next</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
