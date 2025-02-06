<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo-ec.svg') }}" type="image/x-icon">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body class="px-4 bg-gray-100">
    <div class="relative -z-10">
        <div class="fixed">
            <div class="fixed -top-48 -left-48 w-[500px] h-[500px] rounded-full"
                style="background: radial-gradient(circle, rgba(94, 255, 0, 0.474) 0%, rgba(0, 57, 115, 0) 70%);">
            </div>
            <div class="fixed -bottom-48 -right-48 w-[500px] h-[500px] rounded-full"
                style="background: radial-gradient(circle, rgba(94, 255, 0, 0.474) 0%, rgba(0, 57, 115, 0) 70%);">
            </div>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex md:w-4/6 w-full bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="md:w-3/6 w-full">
                <form action="{{ route('login.post') }}" method="post">
                    @csrf
                    <div class="w-full md:px-20 px-5 py-5 xl:py-16">
                        <div class="md:hidden xl:p-5 overflow-hidden rounded-xl mb-5">
                            <img src="{{ asset('image/village1.jpg') }}"
                                class="h-24 w-full object-cover overflow-hidden rounded-xl" />
                        </div>
                        <div class="mb-3 flex flex-wrap items-center justify-center md:justify-center space-x-3">
                            <img src="{{ asset('image/logo.jpg') }}" class="h-5 xl:h-10" alt="Flowbite Logo">
                            <div class="">
                                <div
                                    class="self-center text-slate-600 text-xl xl:text-3xl font-extrabold whitespace-nowrap">
                                    {{ config('app.name') }}
                                </div>
                            </div>
                            <span class="hidden md:flex text-center text-xs mt-2">Selamat datang di website manajemen
                                dusun
                                kretek,
                                warnai dusun
                                kami dengan update kegiatan dusun ❤️</span>
                            <div class="mt-3">
                                <x-alert type="error" />
                            </div>
                        </div>
                        <x-input name="email" type="email" label="Email" required />
                        <x-input name="password" type="password" label="Password" required />
                        <x-button type="submit">Login</x-button>
                    </div>
                </form>
            </div>
            <div class="md:w-3/6 hidden md:block xl:p-5 overflow-hidden rounded-xl">
                <img src="{{ asset('image/village1.jpg') }}"
                    class="h-full w-full object-cover overflow-hidden rounded-xl" />
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
