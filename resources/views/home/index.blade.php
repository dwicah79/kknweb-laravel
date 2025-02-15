<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body class="bg-slate-200">

    <!-- Menampilkan halaman loading -->
    @include('template.navbar')
    @include('template.loading')

    <div class="w-full h-screen overflow-hidden">
        <div class="owl-carousel owl-theme">
            @foreach ($slides as $slide)
                <div class="relative w-full h-screen bg-cover bg-center"
                    style="background-image: url('{{ asset($slide['image']) }}');">
                    <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-4xl font-bold drop-shadow-lg mb-5">{{ $slide['title'] }}</h1>
                            <a href=""
                                class="border border-white p-3 hover:bg-white hover:text-gray-500 rounded-lg font-semibold transition duration-300">Baca
                                Berita Kretek 📰</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                navText: ["&#FFFF;", "&#FFFF;"],
                dots: true
            });
        });
    </script>
</body>

</html>
