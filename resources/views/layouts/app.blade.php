@props(['title' => config('app.name', 'Laravel'), 'header'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

        <!-- Scripts -->


        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="font-sans antialiased">
        <header id="header" class="navbar navbar-expand-lg navbar-bordered">
            <div class="container">
                @include('layouts.navigation')
            </div>
        </header>

        @if($header)
            <header class="bg-white shadow">
                <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $header }}</h1>
                </div>
            </header>
        @endif

        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>

        <script type="text/javascript" src=""></script>

        @stack('scripts')

    </body>
</html>
