@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'BERITA', 'url' => route('news.index')],
        ['name' => 'EDIT BERITA', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <x-alert type="error" />
        <form action="{{ route('news.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap w-full">
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Berita<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="title" value="{{ $data->title }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Judul Berita..." required />
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Penulis Berita<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="writer" value="{{ $data->writer }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Nama Penulis..." required />
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    @if ($data->thumbnail)
                        <div class="mt-3">
                            <p class="block mb-2 text-sm font-medium text-gray-900">Gambar Lama:</p>
                            <img src="{{ asset($data->thumbnail) }}" alt="Gambar UMKM"
                                class="w-full h-20 object-cover rounded-lg">
                        </div>
                    @endif
                    <label for="image" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Gambar Thumbnail Baru
                        <span class="text-red-500">*</span></label>
                    <input type="file" class="filepond" id="image" name="image">
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                        Berita <span class="text-red-500">*</span></label>
                    <select name="category" id="category" required
                        class="rounded-lg border border-slate-300 cursor-pointer w-full">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $data->category_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal<span
                            class="text-red-500">*</span></label>
                    <input type="date" id="name" name="date" value="{{ $data->add_date }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Tanggal..." required />
                </div>
                <div class="mb-5 px-5 w-full">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berita
                        UMKM <span class="text-red-500">*</span></label>
                    <textarea name="content" id="konten" cols="30" rows="10"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $data->content }}</textarea>
                </div>
                <div class="w-full flex justify-end px-5">
                    <button class="btn-primmary w-full md:w-fit" type="submit">Kirim</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#konten'), {
                ckfinder: {
                    uploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const filepond = FilePond.create(document.querySelector('.filepond'), {
            allowImagePreview: true,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            storeAsFile: true,

            onaddfile: (error, file) => {
                if (error) {
                    console.error('Error adding file:', error);
                } else {
                    console.log('File added:', file);
                }
            },
            onremovefile: (file) => {
                document.querySelector('#image').value = ''; // Clear the input value on file removal
            },
        });
    </script>
@endsection
