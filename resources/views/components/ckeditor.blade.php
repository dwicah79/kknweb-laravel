@props(['type' => 'text', 'name', 'label', 'id'])
<div class="mb-5 w-full px-5">
    <label for="{{ $label }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }} <span
            class="text-red-500">*</span></label>
    <textarea id="{{ $id }}" name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:focus:ring-green-500 dark:focus:border-green-500"
        required></textarea>
</div>
