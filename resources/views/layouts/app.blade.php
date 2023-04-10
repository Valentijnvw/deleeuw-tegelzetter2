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
    @stack('scripts')
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
        
        @include('layouts.toasts')
  </body>
</html>

