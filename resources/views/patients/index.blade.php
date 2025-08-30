<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex items-center">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Betegek listája
            </h2>
            <div class="ml-auto">
                <a
                    href="{{ route('admin.patients.create') }}"
                   class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition"
                >
                   Új beteg felvétele
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <form
                    method="GET" action="{{ route('admin.patients.index') }}"
                    class="flex flex-col gap-4 sm:gap-2 sm:flex-row sm:items-center sm:justify-between w-full p-2 sm:p-0"
                >
                    <x-text-input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Keresés név, email..."
                        class="w-full sm:w-64"
                    />
                    <div class="sm:flex items-center gap-2">
                        <label for="per_page" class="block text-sm text-gray-600 dark:text-gray-300">Beteg/Oldal:</label>
                        <select name="per_page" id="per_page" class="w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm">
                            @foreach([5,10,25,50,100] as $size)
                                <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                                    {{ $size }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-auto ml-auto">
                        <x-primary-button class="w-full sm:w-auto">
                            Keresés
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Név</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Születési dátum</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">E-mail</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-200">Műveletek</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($patients as $index => $patient)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                            ID: {{ $patient->id }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-100">
                                            <a href="{{ route('admin.patients.show', $patient) }}" class="text-blue-600 font-medium hover:underline">
                                                {{ $patient->name }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                            {{ optional($patient->birth_date)->format('Y.m.d.') ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                            {{ $patient->email ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="inline-flex items-center space-x-2">
                                                <a
                                                    href="{{ route('admin.patients.edit', $patient) }}"
                                                    class="px-3 py-1 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600 transition text-xs"
                                                >
                                                    <div class="flex items-center justify-center text-lg font-bold">
                                                        <i class="lni lni-gear-1"></i>
                                                    </div>
                                                </a>
                                                <a
                                                    href="{{ route('admin.patients.show', $patient) }}"
                                                    class="px-3 py-1 bg-green-600 text-white rounded-md shadow hover:bg-green-700 transition text-xs"
                                                >
                                                    <div class="flex items-center justify-center text-lg font-bold">
                                                        <i class="lni lni-id-card"></i>
                                                    </div>
                                                </a>
                                                <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" onsubmit="return confirm('Biztosan törlöd ezt a beteget?');" class="inline">
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
                                            Nincsenek megjeleníthető betegek.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 flex items-center justify-between">
                        <div class="text-sm text-gray-600 dark:text-gray-300">
                            Összesen: <span class="font-medium">{{ $patients->total() }}</span> beteg -
                            {{ $patients->firstItem() ?? 0 }} - {{ $patients->lastItem() ?? 0 }}
                        </div>
                        <div>
                            {{ $patients->links('components.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
