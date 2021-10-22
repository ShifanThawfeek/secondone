<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://moja.link/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://moja.link/css/app.css" rel="stylesheet">
    <link href="https://moja.link/css/main.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <!-- <link rel="icon" href="{{ url('favicon.ico') }}" /> -->
    <link rel="icon" href="https://moja.link/favicon.ico" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@100;200;300;400;500;600;700;800&display=swap');
        #app {
            font-family: Rubik !important;
            background: #f4f4f4f4;
        }
    </style>
</head>
<body>
    <div id="app">
        <v-app>
            <Navbar logo="https://moja.link/assets/images/moja_logo_282_187.png" active="{{ \Illuminate\Support\Facades\Route::currentRouteName() }}"></Navbar>
            @yield('content')
        </v-app>
    </div>
</body>
</html>
