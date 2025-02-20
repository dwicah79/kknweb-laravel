<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('image/logo.jpg') }}" type="image/x-icon">
    <title>Dusun Kretek 1</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style>
        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .owl-nav {
            display: flex;
            justify-content: center;
            margin-top: 12px;
            gap: 10px;
        }

        .owl-nav button {
            background: none !important;
            border: none;
            outline: none;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-slate-100 to-primary-100">
    @include('template.navbar')
    @include('template.loading')

    <div>
        @yield('content')
    </div>




    @include('template.footer')

    <script>
        $(document).ready(function() {
            $(".thumbnail-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                dots: true
            });
            $(".sotk-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                dots: true,
                navText: [
                    '<i class="fas fa-chevron-left text-white bg-primary-500 px-3 py-2 rounded-lg"></i>',
                    '<i class="fas fa-chevron-right text-white bg-primary-500 px-3 py-2 rounded-lg"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $(".news-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                dots: true,
                navText: [
                    '<i class="fas fa-chevron-left text-white bg-primary-500 px-3 py-2 rounded-lg"></i>',
                    '<i class="fas fa-chevron-right text-white bg-primary-500 px-3 py-2 rounded-lg"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $(".detile-news-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                dots: true,
                navText: [
                    '<i class="fas fa-chevron-left text-white bg-primary-500 px-3 py-2 rounded-lg"></i>',
                    '<i class="fas fa-chevron-right text-white bg-primary-500 px-3 py-2 rounded-lg"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $(".umkm-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                nav: true,
                dots: true,
                navText: [
                    '<i class="fas fa-chevron-left text-white bg-primary-500 px-3 py-2 rounded-lg"></i>',
                    '<i class="fas fa-chevron-right text-white bg-primary-500 px-3 py-2 rounded-lg"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>
</body>

</html>
