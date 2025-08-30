<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex items-center">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Statisztika
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Heti látogatások</h3>
                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ $weeklyVisitCount }} látogatás ezen a héten
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Legutóbbi látogatások</h3>
                @if($latestVisits->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">Nincsenek látogatások.</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($latestVisits as $visit)
                            <li class="py-2 flex justify-between items-center">
                                <div>
                                    <span class="font-semibold">{{ $visit->patient->name }}</span>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm"> - {{ $visit->reason }}</span>
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $visit->visited_at->format('Y.m.d. H:i') }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Leggyakoribb okok</h3>
                @if(empty($topReasons))
                    <p class="text-gray-600 dark:text-gray-300">Nincsenek adatok.</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($topReasons as $reason => $count)
                            <li class="py-2 flex justify-between items-center">
                                <div>{{ $reason }}</div>
                                <div class="font-semibold">{{ $count }}</div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
