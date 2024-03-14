<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<div class="admin-container mt-5">
    <img class="logo" src="{{asset('assets/logo.jpg')}}" alt="logo">
    <div class="bg-gray-100 dark:bg-gray-900">
        @if (Route::has('login'))
            <div class="hidden px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/backoffice') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back-office</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    {{--                    @if (Route::has('register'))--}}
                    {{--                        <a href="{{ route('register') }}"--}}
                    {{--                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
                    {{--                    @endif--}}
                @endauth
            </div>
        @endif
    </div>
    <div class="versions mt-3">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</div>
</body>
</html>
