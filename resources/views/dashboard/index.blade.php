@extends('template.sidebar')

@section('konten')
    <header>
        <div
            class="card bg-gradient-to-r from-green-500 to-green-300 mt-5 p-8 rounded-xl shadow-lg flex justify-between items-center relative overflow-hidden">
            <div>
                <h1 class="text-2xl md:text-4xl font-bold text-white">Selamat Datang, {{ Auth::user()->name }} 🎉</h1>
                <p class="text-white mt-2">Kelola informasi desa dengan mudah dan cepat.</p>
            </div>
            <div class="w-32 md:w-48 opacity-50">
                <img src="{{ asset('image/people.png') }}" alt="User Image" class="w-full h-full">
            </div>
        </div>
    </header>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 grid-cols-1 gap-6 mt-6">
        @foreach ([['Total Berita', $total_berita, 'bg-green-500', '📜'], ['Total UMKM', $total_umkm, 'bg-blue-500', '🏠'], ['Total Pengguna', $total_pengguna, 'bg-red-500', '👥']] as [$title, $count, $color, $icon])
            <div class="p-6 bg-white shadow-lg rounded-lg flex items-center transition transform hover:scale-105">
                <div class="p-4 {{ $color }} text-white rounded-full text-xl">
                    {{ $icon }}
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-semibold">{{ $title }}</h4>
                    <p class="text-gray-600 text-sm">{{ $count }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Statistik Berita -->
    <div class="bg-white p-5 shadow-md rounded-lg mt-6 max-h-[20em]">
        <h3 class="text-lg font-semibold mb-4">Statistik Berita Bulanan</h3>
        <canvas id="chartBerita"></canvas>
    </div>

    <!-- Data Berita -->
    <div class="bg-white p-5 shadow-md rounded-lg mt-6">
        <h3 class="text-lg font-semibold mb-4">Daftar Berita</h3>
        <table class="w-full bg-gray-50 border border-gray-200 divide-y divide-gray-300 rounded-lg">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">#</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Gambar</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Penulis</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($berita as $item)
                    <tr class="bg-white hover:bg-gray-100">
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ ($berita->currentPage() - 1) * $berita->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-4">
                            <img src="{{ $item->thumbnail }}" alt="Gambar"
                                class="w-16 h-16 object-cover rounded-md border border-gray-300 shadow-sm">
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800 font-semibold">{{ $item->title }}</td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            @if ($item->category->name == 'UMKM')
                                <span class="bg-blue-100 text-blue-500 px-2 py-1 rounded-full">UMKM</span>
                            @elseif ($item->category->name == 'Desa')
                                <span class="bg-green-100 text-green-500 px-2 py-1 rounded-full">Desa</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ $item->writer }}</td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ \Carbon\Carbon::parse($item->add_date)->format('d F Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $berita->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        console.log(@json($labels));
        console.log(@json($data));
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('chartBerita');

            if (!ctx) {
                console.error("Canvas chartBerita tidak ditemukan!");
                return;
            }

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Jumlah Berita per Bulan',
                        data: @json($data),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
