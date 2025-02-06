@props(['type' => 'text', 'name', 'label'])

<div>
    <label for="{{ $label }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }} <span
            class="text-red-500">*</span></label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600">
</div>
