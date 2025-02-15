<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>

    <!-- Custom styles for the loading screen -->
    <!-- loading.blade.php -->
    <!-- loading.blade.php -->
    <style>
        .loading-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-content {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .loading-circle {
            width: 80px;
            height: 80px;
            border: 4px solid #e2e8f0;
            /* Lighter gray border */
            border-top: 4px solid #0284c7;
            /* Darker blue for better contrast */
            border-radius: 50%;
        }

        .loading-text {
            color: #0f172a;
            /* Dark text for contrast */
            font-size: 1.25rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .loading-progress {
            width: 200px;
            height: 3px;
            background: #e2e8f0;
            /* Light gray background */
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background: #0284c7;
            /* Darker blue to match circle */
            border-radius: 3px;
        }

        .loading-dots span {
            display: inline-block;
            opacity: 0;
            color: #0284c7;
            /* Darker blue for dots */
            font-size: 1.5rem;
            margin: 0 2px;
        }
    </style>

    <div class="loading-container">
        <div class="loading-content">
            <div class="loading-circle"></div>
            <div class="loading-text">Memuat<span class="loading-dots"><span>.</span><span>.</span><span>.</span></span>
            </div>
            <div class="loading-progress">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tl = gsap.timeline();

            tl.to('.loading-circle', {
                rotation: 360,
                duration: 1.5,
                ease: 'none',
                repeat: -1
            });

            gsap.to('.loading-dots span', {
                opacity: 1,
                stagger: 0.2,
                repeat: -1,
                yoyo: true
            });

            tl.to('.progress-bar', {
                width: '100%',
                duration: 2,
                ease: 'power1.inOut'
            });

            setTimeout(() => {
                gsap.to('.loading-container', {
                    opacity: 0,
                    duration: 0.5,
                    onComplete: () => {
                        document.querySelector('.loading-container').style.display = 'none';
                    }
                });
            }, 3000);
        });
    </script>
</head>

<body>

</body>

</html>
