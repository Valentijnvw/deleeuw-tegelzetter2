@props(['title' => config('app.name', 'Laravel'), 'header'])


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/scss/theme.scss'])

  </head>

  <body>
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(./assets/svg/components/card-6.svg);">
        <!-- Shape -->
        <div class="shape shape-bottom zi-1">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
            <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
            </svg>
        </div>
        <!-- End Shape -->
        </div>

        <!-- Content -->
        <div class="container py-5 py-sm-7">
        <a class="d-flex justify-content-center mb-5" href="./index.html">
            <img class="zi-2" src="{{ Vite::asset('resources/img/deleeuw-logo.png') }}" alt="Image Description" style="width: 8rem;">
        </a>

        <div class="mx-auto" style="max-width: 30rem;">
            <!-- Card -->
            <div class="card card-lg mb-5">
            <div class="card-body">
                {{ $slot }}
            </div>
            </div>
            <!-- End Card -->

        </div>
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
  </body>
</html>

