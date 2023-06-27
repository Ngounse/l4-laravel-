@php($color = "primary")
<button class="w-full text-white bg-gray-600 hover:bg-{{ $color }}-700 focus:ring-4 focus:outline-none focus:ring-{{ $color }}-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-gray-600 dark:hover:bg-{{ $color }}-700 dark:focus:ring-{{ $color }}-800 rounded-sm">
    @yield('button-text-info')
</button>
