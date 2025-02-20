@extends('template.sidebar')

@section('konten')
    <header>
        <div
            class="card bg-gradient-to-r from-primary-500 to-primary-300 mt-5 p-8 rounded-xl shadow-lg flex justify-between items-center relative overflow-hidden">
            <div>
                <h1 class="text-2xl md:text-4xl font-bold text-white">Selamat Datang, {{ Auth::user()->name }} 🎉</h1>
                <p class="text-white mt-2">Kelola informasi desa dengan mudah dan cepat.</p>
            </div>
            <div class="w-32 md:w-48 opacity-100">
                <img src="{{ asset('image/logo.jpg') }}" alt="User Image" class="w-full h-full rounded-full">
            </div>
        </div>
    </header>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 grid-cols-1 gap-6 mt-6">
        @foreach ([['Total Berita', $total_berita, 'bg-green-500', '📜'], ['Total UMKM', $total_umkm, 'bg-blue-500', '🏠'], ['Total Pengguna', $total_pengguna, 'bg-red-500', '👥']] as [$title, $count, $color, $icon])
            <div
                class="p-6 bg-white shadow-lg rounded-lg flex items-center transition transform hover:scale-105 border-l-4 {{ $color }}">
                <div class="p-4 {{ $color }} text-white rounded-full text-xl">
                    {{ $icon }}
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-semibold">{{ $title }}</h4>
                    <p class="text-gray-600 text-xl font-bold">{{ $count }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Statistik Berita -->
    <div class="bg-white p-5 shadow-md rounded-lg mt-6">
        <h3 class="text-lg font-semibold mb-4">Statistik Berita Bulanan</h3>
        <div id="chartBerita"></div>
    </div>

    <div class="bg-white p-5 shadow-md rounded-lg mt-6">
        <h3 class="text-lg font-semibold mb-4">Daftar Berita</h3>
        <ul class="space-y-4">
            @foreach ($berita as $item)
                <li class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center space-x-4 hover:bg-gray-100 transition">
                    <img src="{{ $item->thumbnail }}" alt="Gambar"
                        class="w-16 h-16 object-cover rounded-md border border-gray-300">
                    <div>
                        <h4 class="text-lg font-semibold">{{ $item->title }}</h4>
                        <p class="text-gray-600 text-sm">{{ \Carbon\Carbon::parse($item->add_date)->format('d F Y') }} |
                            {{ $item->writer }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{ $berita->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'line',
                    height: 300,
                },
                series: [{
                    name: 'Jumlah Berita',
                    data: @json($data)
                }],
                xaxis: {
                    categories: @json($labels)
                },
                colors: ['#3498db'],
                stroke: {
                    curve: 'smooth'
                },
                markers: {
                    size: 5
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartBerita"), options);
            chart.render();
        });
    </script>
@endsection
