@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard')],
        ['name' => 'UMKM', 'url' => route('umkm.index')],
        ['name' => 'TAMBAH DATA UMKM', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <form class="max-w-full mx-auto flex flex-wrap">
            <div class="mb-5 w-1/2 px-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama UMKM <span
                        class="text-red-500">*</span></label>
                <input type="text" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5     dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="Nama UMKM..." required />
            </div>
            <div class="mb-5 w-1/2 px-5">
                <label for="telp" class="block mb-2 text-sm font-medium text-gray-900 ">No Telp. <span
                        class="text-red-500">*</span></label>
                <input type="number" id="telp"
                    class="bg-gray-50 no-spinner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5     dark:focus:ring-green-500 dark:focus:border-green-500"
                    required placeholder="Nomor Bisnis/Pesanan" />
            </div>
            <div class="mb-5 w-full px-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi <span
                        class="text-red-500">*</span></label>
                <textarea id="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5     dark:focus:ring-green-500 dark:focus:border-green-500"
                    required></textarea>
            </div>
            <div class="mb-5 px-5 w-full">
                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar <span
                        class="text-red-500">*</span></label>
                <input type="file" class="filepond" id="gambar" name="gambar" required>
            </div>
            <div class="w-full flex px-5 justify-end">
                <a href="" class="btn-primmary">Kirim</a>
            </div>
        </form>
    </div>


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
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'imageUpload', 'mediaEmbed', 'insertTable', '|',
                    'undo', 'redo'
                ],
                ckfinder: {
                    uploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
