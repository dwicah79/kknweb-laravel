<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Tailwind & Alpine.js</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-slate-200">
    @include('template.navbar')

    <div x-data="{
        activeSlide: 0,
        slides: @json($slides) // Menggunakan data dari Laravel Controller
    }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 4000)" class="relative w-full h-screen overflow-hidden">

        <!-- Slider Items -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                class="absolute inset-0 bg-cover bg-center transition-opacity duration-700"
                :style="'background-image: url(' + slide.image + ');'">
                <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-4xl font-bold drop-shadow-lg" x-text="slide.title"></h1>
                        <p class="text-lg mt-2">Informasi terbaru dari Desa Kersik</p>
                    </div>
                </div>
            </div>
        </template>

        <!-- Navigasi -->
        <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-gray-700 bg-opacity-50 p-3 rounded-full text-white hover:bg-opacity-80">
            &#8592;
        </button>

        <button @click="activeSlide = (activeSlide + 1) % slides.length"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-gray-700 bg-opacity-50 p-3 rounded-full text-white hover:bg-opacity-80">
            &#8594;
        </button>

    </div>

</body>

</html>
