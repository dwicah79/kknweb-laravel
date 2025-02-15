<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('image/logo.jpg') }}" type="image/x-icon">

    <title>Admin Kretek</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite('resources/js/app.js') --}}
    {{-- <script src="{{ asset('js/index.js') }}"></script> --}}

    {{-- chart  --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- filepond --}}
    {{-- FilePond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    {{-- ckeditor --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

</head>

<body class="bg-primary-100">
    <div class="relative -z-10">
        <div class="fixed">
            <div class="fixed -top-48 -left-48 w-[300px] h-[300px] rounded-full"
                style="background: radial-gradient(circle, rgba(24, 138, 204, 0.474) 0%, rgba(59,130,246,0) 70%);">
            </div>
            <div class="fixed -bottom-48 -right-48 w-[300px] h-[300px] rounded-full"
                style="background: radial-gradient(circle, rgba(24, 138, 204, 0.474) 0%, rgba(59,130,246,0) 70%);">
            </div>
        </div>
    </div>



    <nav class="fixed top-0 z-50 w-full xl:hidden bg-white border-b border-gray-200 ">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed bg-white h-dvh md:w-[250px] rounded-xl shadow z-50 md:m-4 md:h-[calc(100vh-2rem)] flex flex-col justify-between transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full flex flex-col justify-center  px-3 bg-white py-5 rounded-lg pb-4 overflow-y-hidden  ">
            <ul class="space-y-5 md:space-y-7 font-medium">
                <li>
                    <a href="#" class="flex ms-2">
                        <img src="{{ asset('image/logo.jpg') }}" class="w-10 rounded-full" alt="">
                        <span class="self-center px-4 font-bold uppercase whitespace-nowrap ">Kretek
                            Village</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 nav-item {{ Request::is('dashboard') ? 'nav-item-active group' : '' }} group">
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>

                </li>
                @if (Auth::user()->rolesuser->first()->name == 'Pengurus-UMKM' ||
                        Auth::user()->rolesuser->first()->name == 'Super-Admin')
                    <li>
                        <a href="{{ route('umkm.index') }}"
                            class="flex items-center p-2  nav-item {{ in_array(Request::path(), ['umkm', 'umkm/create', 'umkm/' . request()->segment(2) . '/edit']) ? ' nav-item-active' : '' }} group">
                            <i class="fa-solid fa-store"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Data UMKM</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->rolesuser->first()->name == 'Pengurus-Desa' ||
                        Auth::user()->rolesuser->first()->name == 'Super-Admin')
                    <li>
                        <a href="{{ route('village.index') }}"
                            class="flex items-center p-2 nav-item {{ in_array(Request::path(), ['village', 'village/create']) ? ' nav-item-active' : '' }}  group">
                            <i class="fa-solid fa-people-roof"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Struktur Dusun</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->rolesuser->first()->name == 'Pengurus-Pemuda' ||
                        Auth::user()->rolesuser->first()->name == 'Super-Admin')
                    <li>
                        <a href="{{ route('youth-organization.index') }}"
                            class="flex items-center p-2 nav-item {{ in_array(Request::path(), ['youth-organization', 'youth-organization/create']) ? ' nav-item-active' : '' }} group">
                            <i class="fa-solid fa-users-between-lines"></i>

                            <span class="flex-1 ms-3 whitespace-nowrap">Struktur Pemuda</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->rolesuser->first()->name == 'Pengurus-PKK' || Auth::user()->rolesuser->first()->name == 'Super-Admin')
                    <li>
                        <a href="{{ route('pkk.index') }}"
                            class="flex items-center p-2 nav-item {{ in_array(Request::path(), ['PKK-organization', 'PKK-organization/create']) ? ' nav-item-active' : '' }}  group">
                            <i class="fa-solid fa-people-line"></i>

                            <span class="flex-1 ms-3 whitespace-nowrap">Struktur PKK</span>

                        </a>
                    </li>
                @endif
                @if (Auth::user()->rolesuser->first()->name == 'Pengurus-Pemuda' ||
                        Auth::user()->rolesuser->first()->name == 'Super-Admin' ||
                        Auth::user()->rolesuser->first()->name == 'Pengurus-Desa')
                    <li>
                        <a href="{{ route('about.index') }}"
                            class="flex items-center p-2 nav-item {{ Request::is('about-website') ? ' nav-item-active' : '' }}  group">
                            <i class="fa-solid fa-inbox"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Website</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('news.index') }}"
                        class="flex items-center p-2 nav-item {{ in_array(Request::path(), ['news', 'news/create', 'news/' . request()->segment(2) . '/edit']) ? ' nav-item-active' : '' }}  group">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Berita</span>

                    </a>
                </li>
                @if (Auth::user()->rolesuser->first()->name == 'Super-Admin')
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="flex items-center p-2 nav-item {{ Request::is('user-management') ? ' nav-item-active' : '' }}  group">
                            <i class="fa-solid fa-user-plus"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Akun</span>

                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="px-3 py-3 bg-white mb-10 flex justify-center ">
            <a href="javascript:void(0);"
                class="items-center space-x-2 gap-2 px-4 py-2 text-sm inline-flex text-white bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg transition duration-300"
                role="menuitem" id="logoutBtn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <div class="p-4 md:ml-[260px] h-max">
        <div class="mt-20 md:mt-0">
            @yield('konten')
            @include('sweetalert::alert')


            <footer class="bg-white  text-black py-3 rounded-lg mt-10">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center">
                        <div class="text-sm font-semibold">
                            <p>&copy; {{ now()->format('Y') }} Develop & Design by Dwi Cahyo N.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Add this in your <head> section -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('logout') }}';
                }
            });
        });
    </script>


</body>

</html>
