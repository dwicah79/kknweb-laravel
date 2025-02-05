@extends('template.sidebar')
@section('konten')
    <div class="rounded-lg">
        <div class="bg-white shadow-md sm:rounded-lg overflow-hidden p-6">
            <div class="w-full">
                <form class="w-full mx-auto">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-300 focus:border-greering-green-300  dark:focus:ring-green-300 dark:focus:border-greering-green-300"
                            placeholder="Search Mockups, Logos..." required />
                        <button type="submit" class="btn-primmary end-2 bottom-1  absolute">Search</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-end m-2 gap-2">
                <a href="" class="btn-primmary h-10 whitespace-nowrap"><i class="fa-solid fa-plus"></i> Tambah</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full bg-gray-50 border border-gray-200 divide-y divide-gray-300 rounded-lg">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">#</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Gambar</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Deskripsi</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Tanggal Dibuat</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Terakhir Diubah</th>
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
                                        class="w-16 h-16 object-cover rounded-md border border-gray-300 shadow-sm">
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 truncate max-w-xs">
                                    {{ Str::limit($item->description, 50, '...') }}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d F Y') }}</td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="" class="text-blue-500 hover:text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <form action="" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
