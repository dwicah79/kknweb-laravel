@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'MANAJEMEN WEBSITE', 'url' => '#'],
    ]" />
    <div class="w-full flex justify-between items-center bg-gradient-primmary px-5 py-5 mb-2">
        <h1 class="font-extrabold uppercase text-white text-xl">SLIDER WEBSITE</h1>
        <a href="{{ route('about.slider.create') }}"
            class="bg-white rounded-lg w-fit whitespace-nowrap p-2 hover:bg-slate-100"><i class="fa-solid fa-plus"></i>
            Tambah</a>
    </div>

    <div class="bg-white shadow-md sm:rounded-lg overflow-hidden p-6">
        <div class="overflow-x-auto mt-5">
            <x-alert type="error"></x-alert>
            {{-- <x-alert type="success"></x-alert> --}}
            <table class="w-full bg-gray-50 border border-gray-200 divide-y divide-gray-300 rounded-lg">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Gambar Slider</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Judul</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($data as $item)
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="px-4 py-4 text-sm text-gray-800">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                            <td class="px-4 py-4">
                                <img src="{{ $item->image }}" alt="Gambar"
                                    class="w-32 h-32 object-cover rounded-md border border-gray-300 shadow-sm">
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-800 font-semibold">{{ $item->title }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('about.slider.edit', $item->id) }}"
                                        class="text-blue-300 hover:text-blue-400">
                                        <i class="fa-solid fa-eye"></i>
                                        </svg>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('about.slider.destroy', $item->id) }}" method="POST"
                                        class="inline">
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
                    @endforeach
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
