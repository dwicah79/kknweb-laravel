@extends('template.sidebar')
@section('konten')
    <x-breadcrumb :links="[
        ['name' => 'DASHBOARD', 'url' => route('dashboard.index')],
        ['name' => 'USER MANAGEMENT', 'url' => route('user.index')],
        ['name' => 'EDIT DATA USER', 'url' => '#'],
    ]" />

    <div class="rounded-lg bg-white p-10">
        <x-alert type="error" />
        <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap w-full">
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ $data->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Nama Lengkap..." required />
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ $data->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Email..." required />
                </div>
                <div class="mb-5 px-5 w-full md:w-1/2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hak Akses
                        <span class="text-red-500">*</span></label>
                    <select name="roles" id="roles" required
                        class="rounded-lg border border-slate-300 cursor-pointer w-full">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}"
                                {{ $data->roles->contains('id', $item->id) ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5 w-full md:w-1/2 px-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Password <span
                            class="text-red-500">*</span></label>
                    <input type="password" id="old_password" name="old_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Password Lama..." required />
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Password Baru <span
                            class="text-red-500">*</span></label>
                    <input type="password" id="new_password" name="new_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Password Baru..." required />
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
