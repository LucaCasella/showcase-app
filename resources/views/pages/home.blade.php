@extends('public')

@section('content')
    <div class="container">
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/AK.jpg')}}" alt="presentation">
            </div>
            <div class="description-wrapper col">
                <div class="description p-4">
                    <div>
                        <h1 class="">ANASTASIA KABAKOVA</h1>
                    </div>
                    <div class="lh-lg my-2">
                        @lang('home.presentation')
                    </div>
                </div>
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="description-wrapper description-revert col">
                <div class="description p-4">

                    <h1 class="">@lang('home.photos-title')</h1>

                    <div class="lh-lg my-2">
                        @lang('home.photos-description')
                    </div>
                    <div>
                        <a class="btn-home" href="#contacts">
                            Scopri i prezzi
                        </a>
                        <a class="btn-home" href="{{route('photos')}}">
                            Sfoglia i miei Album
                        </a>
                    </div>
                </div>
            </div>
            <div class="image-wrapper image-revert col">
                <img class="image" src="{{asset('assets/photohp.jpg')}}" alt="photos">
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/videohp.jpg')}}" alt="videos">
            </div>
            <div class="description-wrapper col">
                <div class="description p-4">
                    <h1 class="">@lang('home.videos-title')</h1>
                    <div class="lh-lg my-2">
                        @lang('home.videos-description')
                    </div>
                    <a class="btn-home" href="{{route('videos')}}">
                        Scopri di più
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('includes.services')
    @include('includes.reviews')
    <x-link-matrimonio-site/>
@endsection
