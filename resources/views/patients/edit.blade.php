<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Betegek listája
            </h2>
            <div>
                <a
                    href="{{ route('admin.patients.create') }}"
                   class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
                >
                   Új beteg felvétele
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
