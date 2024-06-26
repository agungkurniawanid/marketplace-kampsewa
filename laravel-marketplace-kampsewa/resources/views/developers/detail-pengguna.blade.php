@extends('layouts.developers.ly-dashboard')
@section('content')
    {{-- ! main container  --}}
    <div class="_main-container p-[30px] flex flex-col gap-8">

        {{-- ! container component card profile and card information --}}
        <div class="_component-card-profile-and-card-information w-full grid gap-4 grid-cols-[1fr_2fr]">

            {{-- ! card profile --}}
            @include('components.cards.card-profile-detail-pengguna')

            {{-- ! card information --}}
            <div class="_card-information w-full flex flex-col gap-4 rounded-[20px]">

                {{-- ! container card count information --}}
                @include('components.cards.card-information-detp')

                {{-- ! container card produk yang disewakan --}}
                @include('components.cards.card-produk-disewakan-detp')
            </div>
        </div>

        {{-- ! container card produk sedang disewa --}}
        {{-- <div class="_produk-sedang-disewa flex flex-col gap-8">
            <div class="_title">
                <h1 class="text-[24px] font-bold">Produk Sedang Disewa</h1>
                <p class="text-[14px]">Produk sedang disewa lengkap dengan toko yang sedang disewa.</p>
            </div>
            <div class="_wrapper-card grid grid-cols-4 gap-8">
                @for ($i = 1; $i <= 8; $i++)
                    @include('components.cards.card-produk-disewa-detp')
                @endfor
            </div>
        </div> --}}

        {{-- ! container card produk yang sedang disewa oleh customer lain --}}
        {{-- <div class="_produk-sedang-disewa-orang-lain flex flex-col gap-8">
            <div class="_title">
                <h1 class="text-[24px] font-bold">Produk Yang Disewa Customer Lain</h1>
                <p class="text-[14px]">Berikut daftar produk yang sedang disewa oleh customer lain.</p>
            </div>
            <div class="_wrapper-card grid grid-cols-4 gap-8">
                @for ($i = 1; $i <= 8; $i++)
                    @include('components.cards.card-produk-sedangdisewa-custlain-detp')
                @endfor
            </div>
        </div> --}}

        {{-- ! container card riwayat produk yang disewakan dan produk yang disewa --}}
        {{-- <div class="_riwayat-transaksi-sewa-dan-menyewakan flex flex-col gap-8">
            <div class="_wraper-riwayat-transaksi-sewa-transaksi-menyewakan grid grid-cols-2 gap-x-4">
                @include('components.cards.card-riwtransaksi-sewa-detp')
                @include('components.cards.card-riwtransaksi-menyewakan-detp')
            </div>
        </div> --}}
    </div>
    @include('sweetalert::alert')
    <script>
        // filter untuk riwayat sewa
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
@endsection
