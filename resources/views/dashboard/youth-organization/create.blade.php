@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'STRUKTUR PEMUDA', 'url' => route('youth-organization.index')],
        ['name' => 'TAMBAH DATA STRUKTUR PEMUDA', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <x-alert type="error" />
        <form action="{{ route('youth-organization.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap w-full">
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Nama Lengkap..." required />
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="telp" class="block mb-2 text-sm font-medium text-gray-900 ">No Telp. <span
                            class="text-red-500">*</span></label>
                    <input type="number" id="telp" name="telp"
                        class="bg-gray-50 no-spinner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        required placeholder="+62..." />
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan <span
                            class="text-red-500">*</span></label>
                    <select name="position" id="position" required
                        class="rounded-lg border border-slate-300 cursor-pointer w-full">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->job_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar <span
                            class="text-red-500">*</span></label>
                    <input type="file" class="filepond" id="image" name="image" required>
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
