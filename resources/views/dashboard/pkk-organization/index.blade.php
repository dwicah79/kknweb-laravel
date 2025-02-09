@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[['name' => 'DASHBOARD', 'url' => route('dashboard.index')], ['name' => 'STRUKTUR PKK', 'url' => '#']]" />
    <div class="w-full flex justify-between items-center bg-gradient-primmary px-5 py-5 mb-2">
        <h1 class="font-extrabold uppercase text-white text-xl">Data STRUKTUR PKK</h1>
        <a href="{{ route('pkk.create') }}" class="bg-white rounded-lg w-fit whitespace-nowrap p-2 hover:bg-slate-100"><i
                class="fa-solid fa-plus"></i>
            Tambah</a>
    </div>

    <div class="bg-white shadow-md sm:rounded-lg overflow-hidden p-6">
        <div class="w-full flex justify-end ">
            <div class="w-full md:w-1/2">
                <form class="flex items-center justify-end">
                    <label for="voice-search" class="sr-only">Cari</label>
                    <div class="relative w-full">
                        <input type="text" id="voice-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari UMKM..." required />
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-green-500 rounded-lg border border-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>Cari
                    </button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto mt-5">
            <x-alert type="error"></x-alert>
            {{-- <x-alert type="success"></x-alert> --}}
            <table class="w-full bg-gray-50 border border-gray-200 divide-y divide-gray-300 rounded-lg">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Nama Lengkap</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Jabatan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Foto</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">No Telp.</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Tanggal Ditambah</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @forelse ($data as $item)
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="px-4 py-4 text-sm text-gray-800">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                            <td class="px-4 py-4 text-sm text-gray-800">{{ $item->name }}</td>
                            <td class="px-4 py-4 text-sm text-gray-800">{{ $item->village->job_title }}</td>
                            <td class="px-4 py-4">
                                <img src="{{ $item->image }}" alt="Gambar"
                                    class="w-16 h-16 object-cover rounded-md border border-gray-300 shadow-sm">
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-800">{{ $item->telp }}</td>
                            <td class="px-4 py-4 text-sm text-gray-800">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('pkk.edit', $item->id) }}" class="text-blue-300 hover:text-blue-400">
                                        <i class="fa-solid fa-eye"></i>
                                        </svg>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('pkk.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-300 hover:text-red-500 delete-button"
                                            data-id="{{ $item->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-800 text-center" colspan="7">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-5 p-2">
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function() {
                    let itemId = this.getAttribute('data-id');
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + itemId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
