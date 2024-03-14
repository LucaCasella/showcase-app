<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('home.title')</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body class="container">
<header class="sticky-top bg-white">
    @include('includes.header')
</header>
<main class="main">
    @yield('content')
</main>
<footer class="d-flex-column">
    @include('includes.footer')
    <x-link-whatsapp-icon/>
</footer>
</body>
</html>
