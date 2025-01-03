<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('home.title')</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    @vite(['resources/js/react/react-app.jsx'])
</head>
<body>
<div id="react-root"></div>
</body>
</html>
