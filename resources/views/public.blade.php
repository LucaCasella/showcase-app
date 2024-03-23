<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <title>@lang('home.title')</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    @vite(['resources/js/app.js'])
</head>
<body class="container-xxl">
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
<script src='https://widgets.sociablekit.com/google-reviews/widget.js' async defer></script>
<script>
    function showFullImage(img) {
        // Get photo's URL
        var fullImageUrl = img.dataset.fullimage;

        // Create an overlay for the photo in full screen
        var overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        overlay.style.zIndex = '9999';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';

        // Create tag img for the photo in full sreen
        var fullImageElement = document.createElement('img');
        fullImageElement.src = fullImageUrl;
        fullImageElement.alt = 'Full Size Image';
        fullImageElement.classList.add('full-image'); // Add CSS class

        // Add the photo to the overlay
        overlay.appendChild(fullImageElement);

        // Add the overlay to the body
        document.body.appendChild(overlay);

        // Add an event listener to close the overlay the user click on the photo in full sreen
        overlay.onclick = function() {
            document.body.removeChild(overlay);
        };
    }
</script>
</body>
</html>
