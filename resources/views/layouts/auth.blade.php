<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="h-screen w-full md:p-20 bg-jar-auth flex items-center justify-center relative px-5 md:px-0">
        <div class="absolute bg-black w-full h-full top-0 opacity-45"></div>
        <div
            class="md:grid grid-cols-3 rounded-3xl overflow-hidden md:min-w-[671px] max-w-2xl shadow-lg border border-watercouse-600 z-10 md:h-full md:max-h-[500px] md:min-h-[420px]">

            <div
                class="col-span-1 hidden md:block group bg-gradient-to-b from-watercouse-500 via-watercouse-600 to-watercouse-700 hover:!bg-opacity-50">
                <div class="flex items-center justify-center w-full h-full p-10">
                    <img src="{{ asset('assets/images/logo-kab-paser.png') }}"
                        class="group-hover:scale-125 transition-transform duration-300" alt="">
                </div>
            </div>
            <div class="col-span-2 bg-white overflow-hidden px-10 py-5 flex items-center h-full">
                <div class="w-full">
                    <div class="flex-col flex justify-center items-center pb-2 border-b border-gray-300">
                        <p class="text-gray-600 font-extrabold">Aplikasi Layanan Pengaduan Online Masyarakat</p>
                    </div>
                    <div class="py-3">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>

</html>
