<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex items-center">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Statisztika
            </h2>
            <div class="ml-auto">
                <a
                    href="{{ route('admin.statistics.export') }}"
                   class="flex items-center gap-2 px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition"
                >
                    <i class="lni lni-download-1"></i> Heti statisztika
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Heti látogatások</h3>
                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ $weekly_visits_count }} látogatás ezen a héten
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Legutóbbi látogatások</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($latest_visits as $visit)
                        <li class="py-2 flex justify-between items-center">
                            <div>
                                <span class="font-semibold">{{ $visit->patient->name }}</span>
                                <span class="text-gray-500 dark:text-gray-400 text-sm"> - {{ $visit->reason }}</span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                {{ $visit->visited_at->format('Y.m.d. H:i') }}
                            </div>
                        </li>
                    @empty
                        <p class="text-gray-600 dark:text-gray-300">Nincsenek látogatások.</p>
                    @endforelse
                </ul>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Leggyakoribb okok</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($top_reasons as $reason => $count)
                        <li class="py-2 flex justify-between items-center">
                            <div>{{ $reason }}</div>
                            <div class="font-semibold">{{ $count }}</div>
                        </li>
                    @empty
                        <p class="text-gray-600 dark:text-gray-300">Nincsenek adatok.</p>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
