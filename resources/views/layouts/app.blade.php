@props(['title' => config('app.name', 'Laravel'), 'header'])


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/scss/theme.scss'])

    {{-- HS core --}}
    <script src="{{ Vite::asset('resources/js/hs/hs.core.js') }}" ></script>
    {{-- Jquery --}}
    <script src="{{ Vite::asset('node_modules/jquery/dist/jquery.min.js') }}" ></script>
    {{-- Datatables --}}
    <script src="{{ Vite::asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ Vite::asset('resources/js/hs/hs.datatables.js') }}" ></script>
    {{-- FullCalendar --}}
    <script src="{{ Vite::asset('node_modules/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/fullcalendar/timegrid/index.global.min.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/fullcalendar/core/locales/nl.global.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/hs/hs.fullcalendar.js') }}" ></script>
    {{-- Tom select --}}
    <script src="{{ Vite::asset('node_modules/tom-select/dist/js/tom-select.complete.min.js') }}" ></script>
    <script src="{{ Vite::asset('resources/js/hs/hs.tom-select.js') }}" ></script>

    {{-- Script --}}
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
        
        @stack('scripts')
  </body>
</html>

