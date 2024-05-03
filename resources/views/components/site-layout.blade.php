<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}} | Bookworm</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="/css/hsdemo.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="h-full">
    <div class="min-h-full">

        <x-navigation />

        @if(!$hide_title)
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold">{{$title}}</h2>
            </div>
        </header>
        @endif

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
    </div>

    <x-footer />

</body>
</html>