@props(['title' => config('app.name', 'Laravel'), 'header'])


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Hello, world!</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <script src="{{ Vite::asset('node_modules/jquery/dist/jquery.min.js') }}" ></script>
    <script src="{{ Vite::asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ Vite::asset('resources/js/hs/hs.core.js') }}" ></script>
    <script src="{{ Vite::asset('resources/js/hs/hs.datatables.js') }}" ></script>
    <script src="{{ Vite::asset('resources/js/hs/hs-script.js') }}" ></script>
  </head>

  <body>
    @include('layouts.navigation')
    <div class="content container">
        @if($header)
        <div class="page-header">
            <h1 class="page-header-title mt-5">{{$header}}</h1>
        </div>
        @endif
        {{ $slot }}
    </div>
  </body>
</html>

