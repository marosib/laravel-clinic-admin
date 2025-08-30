<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Irányítópult
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    Üdvözlünk, {{ auth()->user()->name }}!
                </h2>
                <p class="mt-1 text-gray-600 dark:text-gray-400">
                    Mai dátum: {{ now()->translatedFormat('Y. F j. D.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Összes beteg</h3>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $total_patients }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Heti látogatások</h3>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $weekly_visits_count }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Legutóbbi betegek</h3>
                    <ul class="mt-2 text-gray-900 dark:text-gray-100 text-sm">
                        @foreach($latest_visits as $visit)
                            <li>{{ $visit->patient->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Leggyakoribb okok</h3>
                    <ul class="mt-2 text-gray-900 dark:text-gray-100 text-sm">
                        @foreach($top_reasons as $reason => $count)
                            <li>{{ $reason }} ({{ $count }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
