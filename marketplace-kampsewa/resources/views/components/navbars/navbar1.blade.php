<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
    <nav class="bg-white w-full">
        <div class="mx-auto max-w-7xl px-8 sm:px-6 lg:px-8">
            <div class="relative flex h-[100px] items-center justify-between">
                {{-- todo title --}}
                <div class="_title">
                    <p class="text-[16px] font-medium ">Selamat Datang,</p>
                    <p class="text-[24px] font-bold">Developer!</p>
                </div>

                {{-- todo icon notification --}}
                <div class="relative ml-3 flex items-center gap-[50px]">
                    <div class="_icon" id="iconButton">
                        <div
                            class="_notification relative w-[45px] h-[45px] gradient-1 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="mt-2 text-white fi fi-rr-bell"></i>
                            <div
                                class="absolute top-0 right-0 mr-[-10px] font-bold w-[25px] h-[25px] text-[12px] bg-red-500 rounded-full text-white flex justify-center items-center">
                                31</div>
                        </div>
                    </div>

                    {{-- todo profile --}}
                    <div class="_profile">
                        <button id="profileButton" class="flex items-center gap-[20px]">
                            <div class="_profile-name text-right">
                                <p class="text-[16px] font-bold">
                                    @if (session('nama_lengkap'))
                                        {{ session('nama_lengkap') }}
                                    @endif
                                </p>
                                <p class="text-[14px] text-[#8B97A8]">
                                   Developer
                                </p>
                            </div>
                            <div class="_profile-image-icon flex items-center gap-[10px]">
                                <img class="h-[50px] w-[50px] rounded-full"
                                    src="{{ asset('assets/image/developers/' . session('foto')) }}" alt="">
                                <i class="mt-1 text-[24px] fi fi-rr-angle-small-down"></i>
                            </div>
                        </button>

                        {{-- todo dropdown component profile --}}
                        <div id="profileCard"
                            class="absolute z-10 right-0 mt-2 bg-white rounded-lg shadow-lg hidden overflow-hidden">
                            <div
                                class="w-full max-w-sm rounded-lg bg-white p-3 drop-shadow-xl divide-y divide-gray-200">
                                <div aria-label="header" class="flex space-x-4 items-center p-4">
                                    <div aria-label="avatar" class="flex mr-auto items-center space-x-4">
                                        <img src="{{ asset('assets/image/developers/' . session('foto')) }}"
                                            alt="avatar Evan You" class="w-[50px] h-[50px] shrink-0 rounded-full" />
                                        <div class="space-y-2 flex flex-col flex-1 truncate">
                                            <div class="font-medium relative text-[16px] leading-tight text-gray-900">
                                                <span class="flex">
                                                    <span class="truncate relative pr-8">
                                                        {{ session('nama_lengkap') }}
                                                    </span>
                                                </span>
                                            </div>
                                            <p class="font-medium text-[14px] leading-tight text-gray-500 truncate">
                                                {{ session('level') }}
                                            </p>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        class="w-6 h-6 text-gray-400 shrink-0" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 9l4 -4l4 4"></path>
                                        <path d="M16 15l-4 4l-4 -4"></path>
                                    </svg>
                                </div>
                                <div aria-label="navigation" class="py-2">
                                    <nav class="grid gap-1">
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            </svg>
                                            <span>Pengaturan Akun</span>
                                        </a>
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9.785 6l8.215 8.215l-2.054 2.054a5.81 5.81 0 1 1 -8.215 -8.215l2.054 -2.054z">
                                                </path>
                                                <path d="M4 20l3.5 -3.5"></path>
                                                <path d="M15 4l-3.5 3.5"></path>
                                                <path d="M20 9l-3.5 3.5"></path>
                                            </svg>
                                            <span>Integrations</span>
                                        </a>
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                                </path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            </svg>
                                            <span>Settings</span>
                                        </a>
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                                <path d="M9 17h6"></path>
                                                <path d="M9 13h6"></path>
                                            </svg>
                                            <span>Guide</span>
                                        </a>
                                        <a href="/"
                                            class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
                                                </path>
                                                <path d="M12 16v.01"></path>
                                                <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483">
                                                </path>
                                            </svg>
                                            <span>Helper Center</span>
                                        </a>
                                    </nav>
                                </div>
                                <div aria-label="footer" class="pt-2">
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button id="logoutButton"
                                            class="flex items-center space-x-3 py-3 px-4 w-full leading-6 text-[14px] text-gray-600 focus:outline-none hover:bg-gray-100 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                                </path>
                                                <path d="M9 12h12l-3 -3"></path>
                                                <path d="M18 15l3 -3"></path>
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- todo untuk dropdown notification --}}
                    <div id="dropdown-notification"
                        class="_wrapper-notification hidden z-10 absolute top-full w-[400px] h-[300px] overflow-y-auto bg-white shadow-box-shadow-12 rounded-[10px] right-0 overflow-hidden">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="cursor-pointer flex hover:bg-gray-100 justify-between py-6 px-4 bg-white">
                                <div class="flex items-center space-x-4">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                        class="rounded-full h-14 w-14" alt="">
                                    <div class="flex flex-col space-y-1">
                                        <span class="font-bold">Leonard Krashner</span>
                                        <span class="text-sm">Yeah same question here too 🔥</span>
                                    </div>
                                </div>
                                <div class="flex-none px-4 py-2 text-stone-600 text-xs md:text-sm">
                                    17m ago
                                </div>
                            </div>
                        @endfor
                        <div class="_viewall p-[15px]">
                            <a href="{{ route('notification.index') }}" class="text-blue-700">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const iconButton = document.getElementById('iconButton');
        const item = document.getElementById('dropdown-notification');
        iconButton.addEventListener('click', () => {
            item.classList.toggle('hidden');
        });
    </script>
    <script>
        const logoutButton = document.getElementById('logoutButton');
        logoutButton.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to logout!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                } else {
                    // Handle ketika pengguna membatalkan tindakan logout
                    Swal.fire('Cancelled', 'Logout cancelled', 'info');
                }
            });
        });
    </script>
    <script>
        // JavaScript to toggle visibility of profile card
        const profileButton = document.getElementById('profileButton');
        const profileCard = document.getElementById('profileCard');
        const closeIcon = document.getElementById('closeIcon');

        profileButton.addEventListener('click', () => {
            profileCard.classList.toggle('hidden');
        });

        closeIcon.addEventListener('click', () => {
            profileCard.classList.add('hidden');
        });
    </script>

</body>

</html>
