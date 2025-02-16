<div class="w-full flex justify-between items-center bg-gradient-to-r from-primary-400 to-primary-200 px-5 py-5 mb-2">
    <h1 class="font-extrabold uppercase text-white text-xl">{{ $title }}</h1>
    <a href="{{ route($route) }}" class="bg-white rounded-lg w-fit whitespace-nowrap p-2 hover:bg-slate-100">
        <i class="fa-solid fa-plus"></i> {{ $buttonText }}
    </a>
</div>
