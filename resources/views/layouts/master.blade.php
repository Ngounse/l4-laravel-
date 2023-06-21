<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>N-@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="antialiased min-h-screen">
    <section class="bg-gray-700 dark:bg-gray-800 text-white">
        <div class="min-h-screen">
            @include('layouts.header')
            <header class="bg-gray-700 shadow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-white-900">@yield('name')</h1>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 flex flex-col items-baseline gap-4 ">
                    <!-- Your content -->
                    @yield('content')
                </div>
            </main>
        </div>
    </section>
</body>
</html>
