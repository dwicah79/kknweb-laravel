<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('image/logo.jpg') }}" type="image/x-icon">

    <title>Dusun Kretek 1</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style>
        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-white to-primary-100">


    @include('template.navbar')
    {{-- @include('template.loading') --}}

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

    <section>
        <div class="container mx-auto mt-5 md:mt-20 flex flex-wrap items-center px-5 md:px-10">
            <div class="w-full md:w-1/2  md:py-32">
                <h1 class="uppercase text-2xl md:text-5xl text-primary-500 font-bold" data-aos="fade-up">Jelajahi Dusun
                </h1>
                <p class="mt-2 text-gray-800 text-sm md:text-lg leading-relaxed" data-aos="fade-up">
                    Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Dusun. Aspek pemerintahan,
                    penduduk, UMKM, potensi Dusun, dan juga berita tentang Dusun.
                </p>
            </div>
            <div class="w-full md:w-1/2 flex flex-wrap justify-center mt-10 md:mt-0">
                <div class="w-1/2 sm:w-1/3 md:w-1/2 p-3" data-aos="flip-left">
                    <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center text-center">
                        <i class="fa-solid fa-landmark text-primary-400 text-7xl"></i>
                        <span class="mt-3 font-semibold uppercase text-gray-700">Profil Dusun</span>
                    </div>
                </div>
                <div class="w-1/2 sm:w-1/3 md:w-1/2 p-3" data-aos="flip-right" data-aos-delay="100">
                    <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center text-center">
                        <i class="fa-solid fa-shop text-primary-400 text-7xl"></i>
                        <span class="mt-3 font-semibold uppercase text-gray-700">UMKM</span>
                    </div>
                </div>
                <div class="w-1/2 sm:w-1/3 md:w-1/2 p-3" data-aos="flip-left" data-aos-delay="200">
                    <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center text-center">
                        <i class="fa-solid fa-newspaper text-primary-400 text-7xl"></i>
                        <span class="mt-3 font-semibold uppercase text-gray-700">Berita Dusun</span>
                    </div>
                </div>
                <div class="w-1/2 sm:w-1/3 md:w-1/2 p-3" data-aos="flip-right" data-aos-delay="300">
                    <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center text-center">
                        <i class="fa-solid fa-panorama text-primary-400 text-7xl"></i>
                        <span class="mt-3 font-semibold uppercase text-gray-700">Galeri Dusun</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" py-10 md:py-20">
        <div class="container mx-auto flex flex-wrap items-center px-5 md:px-10 ">
            <div class="w-full md:w-1/2 flex  justify-center" data-aos="zoom-in">
                <div class="flex flex-col justify-center items-center w-full">
                    <img src="{{ $headvillage->image }}" alt="Foto Kepala Desa"
                        class="w-full max-w-sm md:max-w-md h-96 rounded-lg shadow-lg object-cover">
                    <h1 class="uppercase text-primary-500 font-bold mt-2">{{ $headvillage->name }}</h1>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight"
                    data-aos="fade-up" data-aos-delay="200">
                    Sambutan Kepala Dusun
                </h1>
                <p class=" text-gray-700 text-base md:text-lg text-justify leading-relaxed"data-aos="fade-up"
                    data-aos-delay="300">
                    "{{ $speech }}"
                </p>
            </div>
        </div>
    </section>

    <section class=" py-10 md:py-20">
        <div class="container mx-auto flex flex-wrap items-center px-5 md:px-10 ">
            <div class="w-full" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    Peta Dusun Kretek 1
                </h1>
                <h1 class="font-semibold mb-5">Menampilkan Peta Dusun Kretek 1 dengan interest point</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3212.8895591588016!2d110.18857105353945!3d-7.610484934264316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8ce2c454f2d5%3A0xd4525ff02cc80fb0!2sKretek%201%2C%20Karangrejo%2C%20Borobudur%2C%20Magelang%20Regency%2C%20Central%20Java!5e1!3m2!1sen!2sid!4v1739733126396!5m2!1sen!2sid"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>




    @include('template.footer')

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
