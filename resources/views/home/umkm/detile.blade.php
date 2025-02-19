@extends('template.home')
@section('content')
    <section class="md:mt-24 mt-24 md:mx:auto md:px-20">
        <x-breadcrumb :links="[
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'UMKM', 'url' => '/guestumkm'],
            ['name' => $umkm->name],
        ]" />
        <div class="container mx-auto">
            <div class="flex flex-wrap mb-5">
                <!-- Berita Utama -->
                <div class="w-full p-5 rounded-lg bg-white shadow-md">
                    <div class="flex flex-col md:flex-row  gap-5">
                        <img src="{{ asset($umkm->image) }}" alt="{{ $umkm->name }}"
                            class="w-full md:w-1/2 h-auto mb-4 rounded-lg">
                        <div class="flex flex-col">
                            <h1 class="text-2xl font-bold mb-4">{{ $umkm->name }}</h1>
                            <div class="prose text-justify">
                                {!! $umkm->description !!}
                            </div>
                            <div class="flex justify-start mt-3">
                                <a href="https://wa.me/{{ $umkm->telp }}" target="_blank">
                                    <button
                                        class="bg-primary-500 text-white py-3 px-6 rounded-lg hover:bg-primary-600 transition-colors">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Pesan Sekarang
                                    </button>
                                </a>
                            </div>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700">Bagikan ke:</p>
                                <div class="flex gap-3 mt-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                        target="_blank" class="text-blue-600 text-xl md:text-3xl">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode(Request::url()) }}" target="_blank"
                                        class="text-green-500 text-xl md:text-3xl">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <a href="https://www.instagram.com/?url={{ urlencode(Request::url()) }}" target="_blank"
                                        class="text-pink-500 text-xl md:text-3xl">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- UMKM Terbaru -->
                <div class="hidden md:block w-full mt-5">
                    <div class="p-5 rounded-lg bg-white shadow-md">
                        <h2 class="text-xl font-bold mb-4">UMKM Terbaru</h2>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            @foreach ($recentUmkm as $recent)
                                <a href="{{ route('home.umkm.detile', $recent->id) }}"
                                    class="p-3 bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-lg">
                                    <img src="{{ asset($recent->image) }}" alt="{{ $recent->name }}"
                                        class="w-full h-32 object-cover rounded-lg mb-2">
                                    <h3 class="text-sm font-semibold">{{ Str::limit($recent->name, 50, '...') }}</h3>
                                    <p class="text-xs text-gray-600 mt-1">{{ $recent->created_at->format('d F Y') }}</p>
                                    <p class="text-sm">
                                        {{ Str::limit(strip_tags($recent->description), 100, '...') }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile View -->
                <div class="block md:hidden w-full px-3 mt-5">
                    <h2 class="text-xl font-bold mb-4">UMKM Terbaru</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($recentUmkm as $recent)
                            <a href="{{ route('home.news.detile', $recent->id) }}"
                                class="p-3 bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-lg">
                                <img src="{{ asset($recent->image) }}" alt="{{ $recent->name }}"
                                    class="w-full h-32 object-cover rounded-lg mb-2">
                                <h3 class="text-sm font-semibold">{{ Str::limit($recent->name, 50, '...') }}</h3>
                                <p class="text-xs text-gray-600 mt-1">{{ $recent->created_at->format('d F Y') }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
