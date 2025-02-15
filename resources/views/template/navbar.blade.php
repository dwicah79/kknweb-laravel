<nav class="block w-full max-w-screen px-4 py-2 mx-auto bg-sky-500 shadow-md lg:px-8 lg:py-3">
    <div x-data="{ open: false }" class="container flex flex-wrap items-center justify-between mx-auto text-white">
        <a href="#" class="mr-4 block cursor-pointer py-1.5 text-lg font-jakartasans font-bold  text-white">
            <div class="inline-flex items-center justify-start">
                <img src="{{ asset('image/logo.jpg') }}" alt="logo" class="w-14 h-14 md:w-16 md:h-16 rounded-full">
                <span class="ml-2 text-xl">DUSUN KRETEK 1</span>
            </div>
        </a>

        <!-- Hamburger Button -->
        <button @click="open = !open"
            class="relative ml-auto h-10 w-10 flex items-center justify-center rounded-lg text-white md:hidden focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <ul
            class="hidden md:flex mt-4 space-y-4 text-sm text-center lg:flex-row lg:space-x-6 lg:space-y-0 lg:mt-0 lg:items-center">
            <li>
                <a href="#"
                    class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                    📄 Home
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                    👤 UMKM
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                    📦 Pemuda
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                    📚 Organisasi PKK
                </a>
            </li>
        </ul>

        <!-- Navbar Links -->
        <div :class="open ? 'block' : 'hidden'"
            class="w-full md:hidden md:w-auto transition-all duration-300 ease-in-out">
            <ul
                class="flex flex-col mt-4 space-y-4 text-sm text-center lg:flex-row lg:space-x-6 lg:space-y-0 lg:mt-0 lg:items-center">
                <li>
                    <a href="#"
                        class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                        📄 Home
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                        👤 UMKM
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                        📦 Pemuda
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center gap-2 p-2 text-white font-semibold md:text-lg hover:text-slate-300 transition">
                        📚 Organisasi PKK
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script>
