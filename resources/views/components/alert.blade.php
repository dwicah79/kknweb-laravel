@props(['type' => 'error'])

@if (session($type) || $errors->any())
    <div
        class="p-2 mb-3 text-sm rounded-md 
                {{ $type == 'success' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
        {{ session($type) ?? $errors->first() }}
    </div>
@endif
