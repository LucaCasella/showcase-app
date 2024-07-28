<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery.min.css" />
    <title>@lang('home.title')</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    @vite(['resources/js/app.js'])
</head>
<body class="container-xxl">
<header class="sticky-top bg-white">
    @include('includes.header')
</header>
<main class="main">
    @include('includes.recaptcha-response-fail')
    @yield('content')
    @yield('script')
</main>
<footer class="d-flex-column">
    @include('includes.footer')
    <x-link-whatsapp-icon/>
</footer>
{{--<script src='https://widgets.sociablekit.com/google-reviews/widget.js' async defer></script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.google.com/recaptcha/enterprise.js"></script>
</body>
</html>
