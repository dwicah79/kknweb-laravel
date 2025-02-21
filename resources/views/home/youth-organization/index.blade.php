@extends('template.home')
@section('content')
    <section class="mt-24 md:mx:auto md:px-20">
        <x-breadcrumb :links="[['name' => 'Home', 'url' => '/'], ['name' => 'STRUKTUR PEMUDA', 'url' => '#']]" />
        <div class="container mx-auto px-5 ">
            <div class="w-full mb-8 text-start" data-aos="fade-up" data-aos-delay="200">
                <h1 class="uppercase text-3xl md:text-5xl text-primary-500 font-extrabold leading-tight">
                    STRUKTUR PEMUDA
                </h1>
                <p class="font-semibold">Menyajikan informasi terkait organisasi pemuda di Dusun Kretek 1</p>
            </div>

            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                @foreach ($youth as $person)
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
                    @foreach ($youth as $person)
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

        <div class="hidden md:flex justify-center mb-5">
            {{ $youth->links('vendor.pagination.custom') }}
        </div>
    </section>
@endsection
