<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
