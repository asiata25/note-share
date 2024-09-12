<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full md:w-1/2 max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex items-center gap-4 py-10 flex-col">
                    <x-application-logo class="h-14"/>
                    <h1 class="text-5xl font-bold">Share Notes</h1>
                    <p class="text-center mb-10">Get Started. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, non sit! Pariatur, enim? Cupiditate repudiandae dicta ex, modi totam recusandae cum nemo eligendi maxime sequi enim quas maiores nostrum ut.</p>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </main>

            </div>
        </div>
    </div>
</body>

</html>
