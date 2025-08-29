<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Clinic Admin</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen flex flex-col items-center justify-center px-6">

            <!-- Logo / Branding -->
            <div class="flex items-center space-x-2 mb-8">
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
            </div>

            <!-- Hero -->
            <div class="text-center max-w-lg">
                <h2 class="font-semibold mb-4">Orvosi vizitek egyszerűen</h2>
                <p class="text-gray-600 mb-8">
                    Kezelje pácienseit, rögzítse a viziteket, és kövesse a statisztikákat egy letisztult, modern rendszerben.
                </p>
            </div>

            <!-- Auth buttons -->
            <div class="flex space-x-4">
                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                   Belépés
                </a>
            </div>


            <!-- Footer -->
            <footer class="mt-12 text-sm text-gray-500">
                &copy; {{ date('Y') }} Laravel Clinic Admin - Bemutató projekt
            </footer>
        </div>
    </body>
</html>
