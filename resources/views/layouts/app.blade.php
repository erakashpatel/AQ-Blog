<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title') :: {{ str_replace('_', '-', env('APP_NAME')) }}</title>

        <meta charset="UTF-8">
        <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
        <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
        <meta name="author" content="{{ env('APP_AUTHORS') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('meta')

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mdb.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('stylesheets')
    </head>

    <body>
        @extends('layouts.header')

        <div class="container">
            @yield('content')
        </div>

        <br>
        @extends('layouts.footer')

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/mdb.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
