<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'PMA CIS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            #carousel-wrapper {
                position: relative;
                background-size: cover;
                background-position: center;
                z-index: 1;
                transition: background-image 1.5s ease-in-out;
            }

            #carousel-wrapper::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.4); /* Adjust opacity here */
                z-index: -1;
            }

            #carousel-content{
                position: relative;
            }
        </style>
    </head>

    <body class="font-sans text-gray-900 antialiased" style="position: relative;">
        <div id="carousel-wrapper" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div id="carousel-content" class="w-100 max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
                </div>
            </div>
        </div>

        <script>
            const images = ['/assets/images/PMABackground5.jpg',
                            '/assets/images/PMABackground4.png',
                            '/assets/images/PMABackground.jpg',
                            '/assets/images/PMABackground1.png'];
            let currentIndex = 0;

            function changeBackground() {
                const carouselWrapper = document.getElementById('carousel-wrapper');
                carouselWrapper.style.backgroundImage = `url('${images[currentIndex]}')`;
                currentIndex = (currentIndex + 1) % images.length;
                setTimeout(changeBackground, 3000); // Change background every 3 seconds
            }
            changeBackground();
        </script>
    </body>
</html>
