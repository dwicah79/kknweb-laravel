@extends('template.home')
@section('content')
    <div class="w-full h-screen overflow-hidden">
        <div class="owl-carousel thumbnail-slider">
            @foreach ($slides as $slide)
                <div class="relative w-full h-screen bg-cover bg-center"
                    style="background-image: url('{{ asset($slide['image']) }}');">
                    <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-4xl font-bold drop-shadow-lg mb-5">{{ $slide['title'] }}</h1>
                            <a href="#konten"
                                class="border border-white p-3 hover:bg-white hover:text-gray-500 rounded-lg font-semibold transition duration-300">
                                Explore Kretek</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section id="konten">
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
                        <span class="mt-3 font-semibold uppercase text-gray-700">Organisasi Pemuda</span>
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
                    <img src="{{ $headvillage->image }}" alt="Foto Kepala Desa" loading="lazy"
                        class="w-full max-w-sm md:max-w-md h-96 rounded-lg shadow-lg object-cover">
                    <h1 class="uppercase text-primary-500 font-bold mt-2">{{ $headvillage->name }}</h1>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight" data-aos="fade-up"
                    data-aos-delay="200">
                    Sambutan Kepala Dusun
                </h1>
                <p class="text-gray-700 text-base md:text-lg text-justify leading-relaxed" data-aos="fade-up"
                    data-aos-delay="300">
                    {{ str_replace('&nbsp;', ' ', strip_tags($speech)) }}
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

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-5 md:px-10">
            <div class="w-full" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    SOTK Dusun
                </h1>
                <h1 class="font-semibold mb-5">Struktur Organisasi Dusun Kretek 1</h1>
            </div>
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                @foreach ($data2 as $person)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden text-center" data-aos="fade-up">
                        <img src="{{ asset($person->image) }}" alt="{{ $person->name }}" loading="lazy"
                            class="w-full h-64 object-cover bg-primary-500">
                        <div class="p-4 bg-primary-500 text-white">
                            <h2 class="font-bold text-lg">{{ $person->name }}</h2>
                            <p class="text-sm">{{ $person->village->job_title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="block md:hidden">
                <div class="owl-carousel sotk-slider">
                    @foreach ($data2 as $person)
                        <div class="item bg-white rounded-2xl shadow-lg overflow-hidden text-center">
                            <img src="{{ asset($person->image) }}" alt="{{ $person->name }}" loading="lazy"
                                class="w-full h-64 object-cover bg-primary-500">
                            <div class="p-4 bg-primary-500 text-white">
                                <h2 class="font-bold text-lg">{{ $person->name }}</h2>
                                <p class="text-sm">{{ $person->village->job_title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-5 ">
            <div class="w-full mb-8 text-start" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    Berita Dusun
                </h1>
                <p class="font-semibold">Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan
                    artikel-artikel dari Dusun Kretek 1</p>
            </div>

            <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($news as $item)
                    <a href="{{ route('home.news.detile', $item->id) }}"
                        class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full transition duration-300 hover:shadow-xl"
                        data-aos="fade-up">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                            class="w-full h-56 object-cover">
                        <div class="p-5 flex flex-col flex-grow">
                            <h2 class="font-bold text-lg text-gray-900 hover:text-primary-500 transition duration-200">
                                {{ $item->title }}
                            </h2>
                            <p class="text-sm text-gray-700 flex-grow">
                                {{ Str::limit(strip_tags($item->content), 100, '...') }}
                            </p>
                            <div class="flex items-center justify-between text-gray-500 text-sm mt-3">
                                <div class="flex items-center justify-between w-full">
                                    <div class="inline-flex gap-2">
                                        <i class="fas fa-user"></i> {{ $item->writer }}
                                    </div>
                                    <div class="inline-flex gap-2">
                                        @if ($item->category->name == 'UMKM')
                                            <div class="badge-blue">{{ $item->category->name }}</div>
                                        @elseif ($item->category->name == 'Desa')
                                            <div class="badge-green">{{ $item->category->name }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="bg-primary-500 text-white text-xs font-bold px-3 py-2 rounded-lg">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        <div class="block md:hidden">
            <div class="owl-carousel news-slider">
                @foreach ($news as $item)
                    <a href="{{ route('home.news.detile', $item->id) }}"
                        class="item bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                            class="w-full h-56 object-cover">
                        <div class="p-5 flex flex-col flex-grow">
                            <h2 class="font-bold text-lg text-gray-900">{{ $item->title }}</h2>
                            <p class="text-sm text-gray-700 flex-grow">
                                {{ Str::limit(strip_tags($item->content), 100, '...') }}
                            </p>
                            <div class="flex items-center justify-between text-gray-500 text-sm mt-3">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-user"></i> {{ $item->writer }}
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="bg-primary-500 text-white text-xs font-bold px-3 py-2 rounded-lg">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-5 md:px-10">
            <div class="w-full mb-8 text-start" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    UMKM Dusun
                </h1>
                <p class="font-semibold">Layanan yang disediakan promosi produk UMKM Dusun sehingga mampu meningkatkan
                    perekonomian masyarakat Desa</p>
            </div>

            <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($umkm as $item)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full transition-transform transform hover:scale-105"
                        data-aos="fade-up">

                        <!-- Gambar dengan efek hover zoom -->
                        <div class="relative group">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy"
                                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('home.umkm.detile', $item->id) }}"
                                    class="inline-flex p-3 border-2 border-white rounded-full text-white text-lg font-semibold">Lihat
                                    Detail</a>
                            </div>
                        </div>

                        <!-- Deskripsi dan informasi lainnya -->
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="font-semibold text-xl text-gray-900 mb-2">{{ $item->name }}</h2>
                            <p class="text-sm text-gray-600 flex-grow mb-4">
                                {{ Str::limit(strip_tags($item->description), 100, '...') }}
                            </p>
                            <div class="mt-4 flex justify-center">
                                <a href="https://wa.me/{{ $item->telp }}" target="_blank">
                                    <button
                                        class="bg-primary-500 text-white py-3 px-6 rounded-full hover:bg-primary-600 transition-colors">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Pesan Sekarang
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="block md:hidden">
        <div class="owl-carousel umkm-slider">
            @foreach ($umkm as $item)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full transition-transform transform hover:scale-105"
                    data-aos="fade-up">

                    <!-- Gambar dengan efek hover zoom -->
                    <div class="relative group">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy"
                            class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route('home.umkm.detile', $item->id) }}"
                                class="inline-flex p-3 border-2 border-white rounded-full text-white text-lg font-semibold">Lihat
                                Detail</a>
                        </div>
                    </div>

                    <!-- Deskripsi dan informasi lainnya -->
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="font-semibold text-xl text-gray-900 mb-2">{{ $item->name }}</h2>
                        <p class="text-sm text-gray-600 flex-grow mb-4">
                            {{ Str::limit(strip_tags($item->description), 100, '...') }}
                        </p>
                        <div class="mt-4 flex justify-center">
                            <a href="https://wa.me/{{ $item->telp }}" target="_blank">
                                <button
                                    class="bg-primary-500 text-white py-3 px-6 rounded-full hover:bg-primary-600 transition-colors">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    Pesan Sekarang
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
