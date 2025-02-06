@props(['links'])

<nav class="flex items-center text-gray-600 text-sm mb-2 bg-white p-5 rounded-lg">
    <ol class="list-none flex items-center space-x-2">
        @foreach ($links as $index => $link)
            <li class="flex items-center">
                @if ($loop->first)
                    <a href="{{ $link['url'] }}" class=" font-semibold flex gap-2 items-center">
                        <i class="fa-solid fa-house"></i>
                        {{ $link['name'] }}
                    </a>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    @if (!$loop->last)
                        <a href="{{ $link['url'] }}" class=" font-semibold">{{ $link['name'] }}</a>
                    @else
                        <span class="text-gray-800 font-semibold">{{ $link['name'] }}</span>
                    @endif
                @endif
            </li>
        @endforeach
    </ol>
</nav>
