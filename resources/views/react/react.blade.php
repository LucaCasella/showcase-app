<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <meta name="google-site-verification" content="phEbloRnVbxiVdVeJMFb_LXaqljMciwbk5TRA4UJy_k" />
    @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/app.css'])
</head>
<body>
<div id="root">
</div>
</body>
</html>

