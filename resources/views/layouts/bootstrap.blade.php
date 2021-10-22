<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon -->
    <!-- <link rel="icon" href="{{ url('favicon.ico') }}" /> -->
    <link rel="icon" href="https://moja.link/favicon.ico" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        body {
            background: #f4f4f4f4;
        }
    </style>

    @yield('styles')
</head>
<body>
    @yield('content')
    @yield('scripts')
</body>
</html>
