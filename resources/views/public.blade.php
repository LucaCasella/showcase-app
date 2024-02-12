<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('home.title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="icon" href="{{asset('favicon.ico')}}">

    @vite(['resources/js/app.js'])
</head>
<body class="container">
<header class="sticky-top bg-white">
    @include('includes.header')
</header>
<main class="main">
    @include('includes.home')
</main>
<footer class="d-flex-column">
    @include('includes.footer')
    <x-link-whatsapp-icon/>
</footer>
</body>
</html>
