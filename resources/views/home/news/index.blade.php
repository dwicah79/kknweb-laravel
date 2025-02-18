@extends('template.home')
@section('content')
    <section>
        <x-breadcrumb :links="[['name' => 'Home', 'url' => '/'], ['name' => 'BERITA', 'url' => '#']]" />
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
                    <div class="item bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
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
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        <div class="hidden md:flex justify-center mb-5">
            {{ $news->links('vendor.pagination.custom') }}
        </div>
    </section>
@endsection
