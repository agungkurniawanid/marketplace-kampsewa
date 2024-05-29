@extends('layouts.customers.layouts-customer')
@section('customer-content')
    <div class="--container w-full h-auto flex justify-center px-10 py-5">
        <div class="--wrapper-form w-[800px] h-auto bg-white shadow-box-shadow-11 p-4">
            <h1 class="text-[20px] font-bold">Tambah Barang Penyewaan</h1>
            <p>Tambahkan barang penyewaan! anda bisa memasukkan data barang dengan banyak ukuran dan jenis, seperti warna,
                stok, dan harga sewa yang berbeda.</p>
            <form action="{{ route('menu-produk.tambah-produk-post') }}" class="w-full flex flex-col gap-6 h-auto mt-4"
                method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ $id }}">
                <div class="--input-table-produk grid grid-cols-3 gap-x-2 gap-y-4">
                    <div class="--input-nama-produk w-full">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Produk</p>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" name="nama_produk" placeholder="Masukkan nama produk">
                        @error('nama_produk')
                            <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                        @enderror
                    </div>
                    <div class="--input-deskripsi w-full">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Deskripsi Produk</p>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" name="deskripsi_produk" placeholder="Masukkan deskripsi produk">
                        @error('deskripsi_produk')
                            <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                        @enderror
                    </div>
                    <div class="--input-kategori relative w-full">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Kategori Produk</p>
                        <select name="kategori_produk"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                            <option value="Belum di isi">-- Pilih Kategori --</option>
                            <option value="Tenda">Tenda</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Tas">Tas</option>
                            <option value="Sepatu">Sepatu</option>
                            <option value="Sepatu">Perlengkapan</option>
                        </select>
                        <div class="pointer-events-none absolute top-1/2 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                        @error('kategori_produk')
                            <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                        @enderror
                    </div>
                    <div class="--input-foto-depan flex flex-col">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Input Foto Depan</p>
                        <p class="text-[12px] font-medium mb-2">Disarankan memiliki rasio ukuran 1:1</p>
                        <div>
                            <div>
                                <img id="foto-depan" class="w-full h-[250px] object-cover"
                                    src="{{ asset('images/product-example.jpg') }}" alt="">
                            </div>
                            <label class="block">
                                <input type="file" name="foto_depan" value="{{ old('foto_depan') }}" id="file-input"
                                    onchange="previewImageFotoDepan(event)"
                                    class="block w-full text-sm text-gray-500
                              file:me-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-600 file:text-white
                              hover:file:bg-blue-700
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                              dark:text-neutral-500
                              dark:file:bg-blue-500
                              dark:hover:file:bg-blue-400
                            ">
                            </label>
                            @error('foto_depan')
                                <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                            @enderror
                        </div>
                    </div>
                    <div class="--input-foto-belakang flex flex-col">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Input Foto Belakang</p>
                        <p class="text-[12px] font-medium mb-2">Disarankan memiliki rasio ukuran 1:1</p>
                        <div>
                            <div>
                                <img id="foto-belakang" class="w-full h-[250px] object-cover"
                                    src="{{ asset('images/product-example2.jpg') }}" alt="">
                            </div>
                            <label class="block">
                                <input type="file" name="foto_belakang" value="{{ old('foto_belakang') }}"
                                    id="file-input" onchange="previewImageFotoBelakang(event)"
                                    class="block w-full text-sm text-gray-500
                              file:me-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-600 file:text-white
                              hover:file:bg-blue-700
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                              dark:text-neutral-500
                              dark:file:bg-blue-500
                              dark:hover:file:bg-blue-400
                            ">
                            </label>
                            @error('foto_belakang')
                                <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                            @enderror
                        </div>
                    </div>
                    <div class="--input-foto-kiri flex flex-col">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Input Foto Kiri</p>
                        <p class="text-[12px] font-medium mb-2">Disarankan memiliki rasio ukuran 1:1</p>
                        <div>
                            <div>
                                <img id="foto-kiri" class="w-full h-[250px] object-cover"
                                    src="{{ asset('images/product-example3.webp') }}" alt="">
                            </div>
                            <label class="block">
                                <input type="file" name="foto_kiri" value="{{ old('foto_kiri') }}" id="file-input"
                                    onchange="previewImageFotoKiri(event)"
                                    class="block w-full text-sm text-gray-500
                              file:me-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-600 file:text-white
                              hover:file:bg-blue-700
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                              dark:text-neutral-500
                              dark:file:bg-blue-500
                              dark:hover:file:bg-blue-400
                            ">
                            </label>
                            @error('foto_kiri')
                                <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                            @enderror
                        </div>
                    </div>
                    <div class="--input-foto-kanan flex flex-col">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Input Foto Kanan</p>
                        <p class="text-[12px] font-medium mb-2">Disarankan memiliki rasio ukuran 1:1</p>
                        <div>
                            <div>
                                <img id="foto-kanan" class="w-full h-[250px] object-cover"
                                    src="{{ asset('images/product-example4.webp') }}" alt="">
                            </div>
                            <label class="block">
                                <input type="file" name="foto_kanan" value="{{ old('foto_kanan') }}" id="file-input"
                                    onchange="previewImageFotoKanan(event)"
                                    class="block w-full text-sm text-gray-500
                              file:me-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-600 file:text-white
                              hover:file:bg-blue-700
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                              dark:text-neutral-500
                              dark:file:bg-blue-500
                              dark:hover:file:bg-blue-400
                            ">
                            </label>
                            @error('foto_kanan')
                                <p class="text-red-500 text-xs mt-1">Foto Harus Di isi!</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="--input-table-variant-detail-variant" id="variantContainer">
                    <div class="variant">
                        <div class="w-1/2">
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Warna Produk
                            </p>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="text" name="" placeholder="contoh: Merah">
                            @error('deskripsi_produk')
                                <p class="text-red-500 text-xs mt-1">Warna Harus Di isi!</p>
                            @enderror
                        </div>
                        <div class="sizeContainer mt-2">
                            <div class="size flex items-center gap-4">
                                <div class="w-full">
                                    <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Ukuran
                                    </p>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text" name="" placeholder="contoh: 3x4/XXL">
                                    @error('deskripsi_produk')
                                        <p class="text-red-500 text-xs mt-1">Ukuran Harus Di isi!</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Stok
                                    </p>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text" name="" placeholder="contoh: 20">
                                    @error('stok')
                                        <p class="text-red-500 text-xs mt-1">Stok Harus Di isi!</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga
                                        Sewa
                                    </p>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text" name="" placeholder="contoh: 3x4/XXL">
                                    @error('harga_sewa')
                                        <p class="text-red-500 text-xs mt-1">Harga Harus Di isi!</p>
                                    @enderror
                                </div>
                                <div>
                                    <p class="opacity-0">button</p>
                                    <button type="button"
                                        class="py-3 px-4 rounded flex items-center justify-center h-full bg-red-100 text-red-500"
                                        onclick="removeSize(this)"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="p-2 bg-blue-500 rounded mt-2 text-white font-medium text-[14px]"
                            onclick="addSize(this)">Tambah Detail Variant</button>
                        <button type="button" class="p-2 bg-red-500 rounded mt-2 text-white font-medium text-[14px]"
                            onclick="removeVariant(this)">Hapus Warna</button>
                    </div>
                </div>
                <div class="w-full flex items-center gap-2">
                    <button type="button" class="p-2 bg-blue-500 rounded text-white font-medium text-[14px]"
                        onclick="addVariant()">Tambah Warna</button>
                    <button class="p-2 bg-green-500 rounded text-white font-medium text-[14px]" type="submit">Simpan
                        Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
