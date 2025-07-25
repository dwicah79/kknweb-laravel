@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'UMKM', 'url' => route('umkm.index')],
        ['name' => 'DETAIL UMKM', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <x-alert type="error" />
        <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap w-full">
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama UMKM <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ $umkm->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Nama UMKM..." required />
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="telp" class="block mb-2 text-sm font-medium text-gray-900 ">No Telp. <span
                            class="text-red-500">*</span></label>
                    <input type="number" id="telp" name="telp" value="{{ $umkm->telp }}"
                        class="bg-gray-50 no-spinner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        required placeholder="Nomor Bisnis/Pesanan" />
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        <span class="text-red-500">*</span></label>
                    <textarea name="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $umkm->address }}</textarea>
                </div>
                <div class="mb-5 px-5 w-1/2">
                    @if ($umkm->image)
                        <div class="mt-3">
                            <p class="block mb-2 text-sm font-medium text-gray-900">Gambar Lama:</p>
                            <img src="{{ asset($umkm->image) }}" alt="Gambar UMKM"
                                class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endif
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar Baru <span
                            class="text-red-500">*</span></label>
                    <input type="file" class="filepond" id="image" name="image">
                </div>
                <div class="mb-5 px-5 w-full">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten
                        UMKM <span class="text-red-500">*</span></label>
                    <textarea name="description" id="konten" cols="30" rows="10"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $umkm->description }}</textarea>
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
