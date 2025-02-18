@extends('template.home')
@section('content')
    <section>
        <x-breadcrumb :links="[
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'BERITA', 'url' => '/guestnews'],
            ['name' => $news->title],
        ]" />
        <div class="container mx-auto">
            <div class="flex flex-wrap mb-5">
                <!-- Berita Utama -->
                <div class="w-full lg:w-8/12 p-5 rounded-lg bg-white shadow-md">
                    <h1 class="text-2xl font-bold mb-4">{{ $news->title }}</h1>
                    <div class="flex gap-2">
                        <p class="text-gray-600 mb-4 inline-flex items-center gap-2">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ $news->created_at->format('d F Y') }}
                        </p>
                        <p class="text-gray-600 mb-4 inline-flex items-center gap-2">
                            <i class="fa-regular fa-user"></i>
                            {{ $news->writer }}
                        </p>
                    </div>
                    <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-auto mb-4 rounded-lg">
                    <div class="prose text-justify">
                        {!! $news->content !!}
                    </div>
                </div>

                <!-- Recent News -->
                <div class="hidden md:block w-full lg:w-4/12 pl-5">
                    <div class="p-5 rounded-lg bg-white shadow-md">
                        <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
                        @foreach ($recentNews as $recent)
                            <a href="{{ route('home.news.detile', $recent->id) }}"
                                class="mb-6 p-3 bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full transition duration-300 hover:shadow-xl">
                                <img src="{{ asset($recent->thumbnail) }}" alt="{{ $recent->title }}"
                                    class="w-full h-40 object-cover mb-2 rounded-lg">
                                <h3 class="text-lg font-semibold">{{ $recent->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $recent->created_at->format('d F Y') }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
