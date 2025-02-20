@extends('template.home')
@section('content')
    <section class="md:mt-24 mt-24 md:mx:auto md:px-20">
        <x-breadcrumb :links="[
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'BERITA', 'url' => '/guestnews'],
            ['name' => $news->title],
        ]" />
        <div class="container mx-auto">
            <div class="flex flex-wrap mb-5">
                <!-- Berita Utama -->
                <div class="w-full lg:w-9/12 p-5 rounded-lg bg-white shadow-md">
                    <h1 class="text-2xl font-bold mb-4">{{ $news->title }}</h1>
                    <div class="flex gap-2">
                        <p class="text-gray-600 mb-4 inline-flex items-center gap-2">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ \Carbon\Carbon::parse($news->add_date)->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}
                        </p>
                        <p class="text-gray-600 mb-4 inline-flex items-center gap-2">
                            <i class="fa-regular fa-user"></i>
                            {{ $news->writer }}
                        </p>
                    </div>
                    <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}"
                        class="w-full h-auto mb-4 rounded-lg">
                    <div class="prose text-justify">
                        {!! $news->content !!}
                    </div>
                </div>

                <!-- Recent News -->
                <div class="hidden md:block w-full lg:w-3/12 pl-5">
                    <div class="p-5 rounded-lg bg-white shadow-md">
                        <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
                        @foreach ($recentNews as $recent)
                            <a href="{{ route('home.news.detile', $recent->id) }}"
                                class="mb-6 p-3 bg-white rounded-2xl shadow-lg overflow-hidden flex items-center gap-3 transition duration-300 hover:shadow-xl">
                                <img src="{{ asset($recent->thumbnail) }}" alt="{{ $recent->title }}"
                                    class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex flex-col">
                                    <h3 class="text-sm font-semibold">{{ Str::limit($recent->title, 50, '...') }}</h3>
                                    <p class="text-xs text-gray-600 mb-1 mt-1 inline-flex gap-2"><i
                                            class="fa-solid fa-calendar-days"></i>
                                        {{ \Carbon\Carbon::parse($recent->add_date)->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}
                                    </p>
                                    <p class="text-gray-600 mb-1 text-xs  inline-flex items-center gap-2">
                                        <i class="fa-regular fa-user"></i>
                                        {{ $recent->writer }}
                                    </p>
                                    <p class="text-gray-600 text-xs  inline-flex items-center gap-2">
                                        <i class="fa-solid fa-list"></i>
                                        @if ($recent->category->name == 'UMKM')
                                            Berita {{ $recent->category->name }}
                                        @elseif ($recent->category->name == 'Desa')
                                            Berita {{ $recent->category->name }}
                                        @endif
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="block md:hidden w-full px-3 mt-5">
                    <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
                    <div class="owl-carousel detile-news-slider">
                        @foreach ($recentNews as $item)
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
        </div>
    </section>
@endsection
