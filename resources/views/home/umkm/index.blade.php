@extends('template.home')
@section('content')
    <section class="mt-24 md:mx:auto md:px-20">
        <x-breadcrumb :links="[['name' => 'Home', 'url' => '/'], ['name' => 'UMKM', 'url' => '#']]" />
        <div class="container mx-auto px-5 ">
            <div class="w-full mb-8 text-start" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    UMKM Dusun
                </h1>
                <p class="font-semibold">Layanan yang disediakan promosi produk UMKM Dusun sehingga mampu meningkatkan
                    perekonomian masyarakat Dusun</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-5">
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
        <div class="hidden md:flex justify-center mb-5">
            {{ $umkm->links('vendor.pagination.custom') }}
        </div>
    </section>
@endsection
