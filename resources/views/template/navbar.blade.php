<nav x-data="{
    scrolled: false,
    open: false,
    isHome: window.location.pathname === '/'
}" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="(isHome && !scrolled) ? 'bg-transparent' : 'bg-sky-500 shadow-md'"
    class="fixed top-0 left-0 w-full max-w-screen px-4 mx-auto transition-all duration-300 ease-in-out lg:px-8 z-50">

    <div class="container flex flex-wrap items-center justify-between mx-auto text-white">
        <a href="#" class="mr-4 block cursor-pointer py-1.5 text-lg font-jakartasans font-bold">
            <div class="inline-flex items-center">
                <img src="{{ asset('image/logo.jpg') }}" alt="logo" class="w-14 h-14 md:w-16 md:h-16 rounded-full">
                <span class="ml-2 text-xl">DUSUN KRETEK 1</span>
            </div>
        </a>

        <!-- Hamburger Button -->
        <button @click="open = !open"
            class="relative ml-auto h-10 w-10 flex items-center justify-center rounded-lg md:hidden focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6">
            <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Home</a></li>
            <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">UMKM</a></li>
            <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Pemuda</a></li>
            <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Organisasi
                    PKK</a></li>
            <li><a href="{{ route('home.news.index') }}"
                    class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Berita</a></li>
            <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Galeri</a></li>
        </ul>

        <!-- Menu Mobile -->
        <div :class="open ? 'block' : 'hidden'"
            class="w-full md:hidden absolute top-full left-0 bg-sky-500 shadow-lg transition-all duration-300">
            <ul class="flex flex-col space-y-4 text-center p-4">
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Home</a></li>
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">UMKM</a></li>
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Pemuda</a>
                </li>
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Organisasi
                        PKK</a></li>
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Berita</a>
                </li>
                <li><a href="#" class="p-2 font-semibold md:text-lg hover:text-slate-300 transition">Galeri</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script>
