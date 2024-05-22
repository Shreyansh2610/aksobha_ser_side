<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}"> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    {{-- <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}">
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('custom/css/custom_style.css') }}">
    <!-- Styles -->
    @yield('panels-head')
</head>
<body class="font-sans antialiased bg-white text-dark/50">
    @yield('content')
    @yield('panels-script')
</body>
</html>
