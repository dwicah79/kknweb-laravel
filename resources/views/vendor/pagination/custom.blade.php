@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-center mt-6">
        <ul class="flex items-center space-x-2  p-2 rounded-lg shadow-md">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    <i class="fas fa-angle-left"></i>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-2 text-gray-500">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition duration-200 shadow-sm">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            @else
                <li class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    <i class="fas fa-angle-right"></i>
                </li>
            @endif
        </ul>
    </nav>
@endif
