@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'GALERI DUSUN', 'url' => route('gallery.index')],
        ['name' => 'EDIT GALERI DUSUN', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <x-alert type="error" />
        <form action="{{ route('gallery.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="flex flex-wrap w-full">
                <div class="mb-5 w-full  px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Gambar<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="title" value="{{ $data->title }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Judul Berita..." required />
                </div>
                {{-- gambar lama  --}}
                <div class="mb-5 px-5 w-full">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar lama</label>
                    <img src="{{ asset($data->image) }}" alt="Gambar"
                        class="w-full h-32 object-cover rounded-md border border-gray-300 shadow-sm">
                </div>
                <div class="mb-5 px-5 w-full">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar Baru<span
                            class="text-red-500">*</span></label>
                    <input type="file" class="filepond" id="image" name="image">
                </div>
                <div class="w-full flex justify-end px-5">
                    <button class="btn-primmary w-full md:w-fit" type="submit">Kirim</button>
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
