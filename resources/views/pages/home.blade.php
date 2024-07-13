@extends('public')

@section('content')
    <div class="container mb-5">
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/AK.jpg')}}" alt="presentation">
            </div>
            <div class="description-wrapper col">
                <div class="description p-3">
                    <div>
                        <h1 class="">@lang('home.AK')</h1>
                    </div>
                    <div class="lh-lg my-2">
                        @lang('home.presentation')
                    </div>
                </div>
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="description-wrapper description-revert col">
                <div class="description p-3">
                    <h1 class="">@lang('home.photos-title')</h1>
                    <div class="lh-lg my-2">
                        @lang('home.photos-description')
                    </div>
                </div>
                <div class="link-container my-3">
                    <a class="link-black" href="#contacts">
                        @lang('home.goto-prices')
                    </a>
                    <a class="link-white" href="{{route('photos')}}">
                        @lang('home.goto-albums')
                    </a>
                </div>
            </div>
            <div class="image-wrapper image-revert col">
                <img class="image" src="{{asset('assets/photohp.jpg')}}" alt="photos" loading="lazy">
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/videohp.jpg')}}" alt="videos" loading="lazy">
            </div>
            <div class="description-wrapper col">
                <div class="description p-3">
                    <h1 class="">@lang('home.videos-title')</h1>
                    <div class="lh-lg my-2">
                        @lang('home.videos-description')
                    </div>
                </div>
                <div class="link-container my-3">
                    <a class="link-black" href="#contacts">
                        @lang('home.goto-prices')
                    </a>
                    <a class="link-white" href="{{route('videos')}}">
                        @lang('home.goto-videos')
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-other-services/>
    <x-instagram-photos/>
    <x-reviews/>
    <x-link-matrimonio-site/>
    <x-contact-form/>
    <x-google-maps-iframe/>
@endsection
