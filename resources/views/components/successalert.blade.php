@props(['type' => 'success'])

@if (session($type))
    <div id="alert-success"
        class="flex items-center p-4 mb-4 text-sm gap-1 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <i class="fa-regular fa-circle-check text-lg"></i>
        <span class="sr-only">Success</span>
        <div>
            <span class="font-medium">Success!</span>
            {{ session($type) }}
        </div>
    </div>

    <script>
        setTimeout(function() {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500); // Remove after fade-out
            }
        }, 3000); // Hide after 3 seconds
    </script>
@endif
