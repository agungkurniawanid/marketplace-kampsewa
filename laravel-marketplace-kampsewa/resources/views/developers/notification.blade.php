@include('components.modals.balas-feedback')
@extends('layouts.developers.ly-dashboard')
@section('content')
    <div class="_container w-full p-[20px] flex flex-col gap-[10px]">

        {{-- todo wrapper feedback --}}
        <div class="_wrapper-feedback w-full grid grid-cols-[2fr_1fr] gap-[10px] h-[600px]">
            {{-- todo container feedback --}}
            @include('components.cards.card-feedback')

            {{-- todo card feedback sudah dibalas --}}
            @include('components.cards.card-feedback-dibalas')
        </div>
    </div>

    <script>
        const modal = document.getElementById('balas-feedback');
        const idButton = document.getElementById('tambah-balasan');
        const submitPemasukan = document.getElementById('simpan-balas-feedback');
        const formTambahPemasukan = document.getElementById('form-balas-feedback');
        const cancelButton = document.getElementById('cancel-balas-feedback');

        // Fungsi untuk menampilkan atau menyembunyikan modal
        function modalHandlerPemasukanCustomer(val) {
            if (val) {
                modal.style.display = "flex";
            } else {
                modal.style.display = "none";
            }
        }

        idButton.addEventListener('click', (event) => {
            modalHandlerPemasukanCustomer(true);
        });

        cancelButton.addEventListener('click', () => {
            modalHandlerPemasukanCustomer(false);
        });

        submitPemasukan.addEventListener('click', function(event) {
            if(document.getElementById('message').value == ''){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Input Pesan masih kosong!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                return;
            }

            Swal.fire({
                title: 'Menyimpan data...',
                allowOutsideClick: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });
            setTimeout(() => {
                formTambahPemasukan.submit();
            }, 1000);
        });

    </script>
@endsection
