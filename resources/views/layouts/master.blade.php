<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('cfrs')
    <title>Kta23v_app</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @include("components.css")

</head>

<body>
<header>
    @include ("layouts.loginbar")
    @include ("layouts.navbar")
</header>
@yield('content')

@include("layouts.footer")
@include("components.js")

@stack('scripts')
</body>
</html>
