<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">

                <div class="shrink-0 flex items-center h-16">
                    <a class="block" href="{{ route('dashboard') }}">
                        <div class="flex items-center ">
                            <div class="size-10 rotate-[30deg]">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><defs><style>.cls-1{fill:none;stroke:rgb(37,99,235);stroke-linecap:round;stroke-linejoin:round;stroke-width:2px}</style></defs><path class="cls-1" d="M14.14 4c0 10 19.77 10 19.77 20S14.14 34 14.14 44"/><path class="cls-1" d="M33.91 4c0 10-19.77 10-19.77 20s19.77 10 19.77 20"/><path class="cls-1" d="M33.91 4c0 10-19.77 10-19.77 20M30 23H14M25 18h-7M30 10h-7M33 6H20M18 38h7M15 42h13M29 28H16"/><path class="cls-1" d="M-496-632h700V68h-700z"/></svg>
                            </div>
                            <span class="font-bold text-gray-800">Laravel Clinic Admin</span>
                        </div>
                    </a>
                </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
