@extends('template.sidebar')
@section('konten')
    <header>
        <div
            class="card bg-gradient-to-tr mt-5 from-green-600 md:p-10 to-green-200 mb-10 flex justify-between items-center rounded-lg relative">
            <div class="md:py-10 md:px-8 px-4 py-10 z-20">
                <div class="md:text-3xl text-xl md:flex font-bold text-white">
                    Selamat Datang
                    <div class="md:ms-2 md:w-[400px] w-[180px]">
                        <p class="font-normal truncate"> </p>
                    </div>
                </div>
            </div>
            <div class="absolute z-10 bottom-0 md:-bottom-5  md:right-0 -right-7 md:flex justify-end px-8">
                <div class="w-24 md:w-60">
                    <img src="{{ asset('image/people.png') }}" alt="Dokumen" class="w-full h-full">
                </div>
            </div>
        </div>
    </header>
@endsection
