@props(['type' => 'error'])

@if (session($type) || ($type == 'error' && session('errors')))
    <div id="alert"
        class="flex items-center p-4 mb-4 text-sm gap-1 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
        role="alert">
        <i class="fa-regular fa-circle-xmark text-lg"></i>
        <span class="sr-only">{{ ucfirst($type) }}</span>
        <div>
            <span class="font-medium">{{ ucfirst($type) . '!' }}</span>
            {{ session($type) ?? session('errors')->first() }}
        </div>
    </div>
@elseif (session('success'))
    <div id="alert"
        class="flex items-center p-4 mb-4 text-sm gap-1 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <i class="fa-regular fa-circle-check text-lg"></i>
        <span class="sr-only">Success</span>
        <div>
            <span class="font-medium">Success!</span>
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session($type) || session('success') || ($type == 'error' && session('errors')))
    <script>
        setTimeout(function() {
            const alert = document.getElementById('alert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
@endif
