@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'SAMBUTAN KEPALA DUSUN', 'url' => '#'],
    ]" />
    <x-header-component title="SAMBUTAN KEPALA DUSUN" route="speech.create" />
    <div class="bg-white shadow-md sm:rounded-lg overflow-hidden p-6">
        <div class="overflow-x-auto mt-5">
            <x-alert type="error"></x-alert>
            <table class="w-full bg-gray-50 border border-gray-200 divide-y divide-gray-300 rounded-lg">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Teks Sambutan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Tanggal Dibuat</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($data as $item)
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="px-4 py-4 text-sm text-gray-800">
                                {{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-sm text-gray-800 font-semibold">{!! $item->speech !!}</td>
                            <td class="px-4 py-4 text-sm text-gray-800 font-semibold">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('speech.edit', $item->id) }}"
                                        class="text-blue-300 hover:text-blue-400">
                                        <i class="fa-solid fa-eye"></i>
                                        </svg>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('speech.destroy', $item->id) }}" method="POST" class="inline">
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
