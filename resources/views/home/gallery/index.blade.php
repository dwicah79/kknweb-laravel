@extends('template.home')
@section('content')
    <section class="mt-24 md:mx:auto md:px-20">
        <x-breadcrumb :links="[['name' => 'Home', 'url' => '/'], ['name' => 'GALERI DUSUN', 'url' => '#']]" />
        <div class="container mx-auto px-5 ">
            <div class="w-full mb-8 text-start" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    GALERI DUSUN
                </h1>
                <p class="font-semibold">Menyajikan informasi terkait kegiatan di Dusun Kretek 1</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                @foreach ($gallery as $galeri)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden text-center" data-aos="fade-up">
                        <img src="{{ asset($galeri->image) }}" alt="{{ $galeri->name }}" loading="lazy"
                            class="w-full h-64 object-cover bg-primary-500">
                        <div class="p-4 bg-primary-500 text-white h-full">
                            <p class="text-sm">{{ $galeri->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- <div class="block md:hidden">
                <div class="owl-carousel sotk-slider">
                    @foreach ($gallery as $galeri)
                        <div class="item bg-white rounded-2xl shadow-lg overflow-hidden text-center">
                            <img src="{{ asset($galeri->image) }}" alt="{{ $galeri->name }}" loading="lazy"
                                class="w-full h-64 object-cover bg-primary-500">
                            <div class="p-4 bg-primary-500 text-white">
                                <p class="text-sm">{{ $galeri->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}

            <div class="flex justify-center mb-5">
                {{ $gallery->links('vendor.pagination.custom') }}
            </div>
    </section>
@endsection
