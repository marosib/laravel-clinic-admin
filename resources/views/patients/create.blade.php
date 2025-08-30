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
                Új beteg felvétele
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.patients.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="'Név'" />
                            <x-text-input
                                id="name"
                                class="block mt-1 w-full"
                                type="text"
                                name="name"
                                :value="old('name')"
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="'E-mail'" />
                            <x-text-input
                                id="email"
                                class="block mt-1 w-full"
                                type="email"
                                name="email"
                                :value="old('email')"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="birth_date" :value="'Születési dátum'" />
                            <x-text-input
                                id="birth_date"
                                class="block mt-1 w-full"
                                type="date"
                                name="birth_date"
                                :value="old('birth_date')"
                            />
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                Mentés
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
