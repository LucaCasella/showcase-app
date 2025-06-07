<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Localized title and meta --}}
    <title>@yield('title', __('meta.default_title'))</title>
    <meta name="description" content="@yield('description', __('meta.default_description'))">
    <meta property="og:title" content="@yield('og_title', __('meta.default_title'))" />
    <meta property="og:description" content="@yield('og_description', __('meta.default_description'))" />
    <meta property="og:image" content="@yield('og_image', asset('assets/logo.jpg'))" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />

    {{-- Fonts and Vite --}}
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/app.css'])

    <meta name="google-site-verification" content="phEbloRnVbxiVdVeJMFb_LXaqljMciwbk5TRA4UJy_k" />

    <script>
        window.IS_PRODUCTION = {{ app()->environment('production') ? 'true' : 'false' }};
    </script>
</head>
<body>
<div id="root">
</div>
</body>
</html>

