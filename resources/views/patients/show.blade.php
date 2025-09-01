<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-x-2">
            <a
                href="{{ route('admin.patients.index') }}"
                class="flex items-center justify-center size-[42px] bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition"
            >
                <div class="flex items-center justify-center text-lg font-bold">
                    <i class="lni lni-arrow-left"></i>
                </div>
            </a>
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ $patient->name }}
            </h2>
            <div class="ml-auto">
                <a
                    href="{{ route('admin.patients.edit', $patient->id) }}"
                   class="block px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition"
                >
                    <div class="flex items-center gap-2 justify-center text-lg">
                        <i class="lni lni-gear-1"></i> Szerkesztés
                    </div>
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-12 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">Név:</span>
                        <span>{{ $patient->name }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">E-mail:</span>
                        <span>{{ $patient->email ?? '-' }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">Születési dátum:</span>
                        <span>{{ optional($patient->birth_date)->format('Y.m.d.') ?? '-' }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">Utolsó látogatás:</span>
                        <span>{{ $visits?->last()?->visited_at?->diffForHumans() ?? '-' }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">Létrehozva:</span>
                        <span>{{ $patient->created_at->format('Y.m.d. H:i') }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-4">
                        <span class="font-semibold w-32">Frissítve:</span>
                        <span>{{ $patient->updated_at->format('Y.m.d. H:i') }}</span>
                    </div>
                </div>
            </div>
            <div x-data="{ show : false}">
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                        Vizitek
                    </h2>
                    <div class="ml-auto">
                        <button
                            x-on:click="show = !show"
                            class="px-6 py-3  text-white rounded-lg shadow transition-all duration-300 ease-in-out"
                            :class="show ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700'"
                        >
                            <div class="flex items-center gap-2 justify-center text-lg">
                                <i :class="show ? 'rotate-45' : ''" class="lni lni-plus transition-all duration-300 ease-in-out"></i> Új vizit
                            </div>
                        </button>
                    </div>
                </div>
                <div
                    x-show="show"
                    x-transition
                    class="my-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('admin.visits.store', $patient->id) }}">
                            @csrf
                            <div>
                                <x-input-label for="reason" :value="'Vizit oka/Panasz'" />
                                <x-text-input
                                    id="reason"
                                    class="block mt-1 w-full"
                                    type="text"
                                    name="reason"
                                    :value="old('reason')"
                                    autofocus
                                />
                                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="visited_at" :value="'Vizit dátuma'" />
                                <x-text-input
                                    id="visited_at"
                                    class="block mt-1 w-full"
                                    type="date"
                                    name="visited_at"
                                    :value="old('visited_at')"
                                />
                                <x-input-error :messages="$errors->get('visited_at')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-primary-button>
                                    Mentés
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">#</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Vizit oka/Panasz</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Vizit dátuma</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse($visits as $index => $visit)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                                ID: {{ $visit->id }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-100">
                                                {{ $visit->reason }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                                {{ optional($visit->visited_at)->format('Y.m.d. h:m') ?? '-' }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="inline-flex items-center space-x-2">
                                                    <form action="{{ route('admin.visits.destroy', $visit->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd ezt a vizitet?');" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="px-3 py-1 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition text-xs"
                                                        >
                                                            <div class="flex items-center justify-center text-lg font-bold">
                                                                <i class="lni lni-trash-3"></i>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-4 py-6 text-center text-gray-600 dark:text-gray-300">
                                                Nincsenek megjeleníthető vizitek.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 flex items-center justify-between">
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                Összesen: <span class="font-medium">{{ $visits->total() }}</span> beteg -
                                {{ $visits->firstItem() ?? 0 }} - {{ $visits->lastItem() ?? 0 }}
                            </div>
                            <div>
                                {{ $visits->links('components.custom-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
