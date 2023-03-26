<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

        <main id="content" role="main" class="main">
        
            <!-- Content -->
            <div class="content container">
                {{ $slot }}
            </div>
        </main>

        <script type="text/javascript" src=""></script>

        @stack('scripts')

    </body>
</html>
