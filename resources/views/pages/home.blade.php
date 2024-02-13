@extends('public')

@section('content')
    <div class="container">
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/RA-95.jpg')}}" alt="presentation">
            </div>
            <div class="description-wrapper col">
                <div class="description p-5">
                    <h1 class="mb-3">ANASTASIA KABAKOVA</h1>
                    <div class="lh-lg">
                        @lang('home.presentation')
                        <ul>
                            <li>@lang('home.weddings')</li>
                            <li>@lang('home.sessions')</li>
                            <li>@lang('home.reportage')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="description-wrapper description-revert col">
                <div class="description p-5">
                    <h1 class="mb-3">@lang('home.photos-title')</h1>
                    <div class="lh-lg">
                        @lang('home.presentation')
                        <ul>
                            <li>@lang('home.weddings')</li>
                            <li>@lang('home.sessions')</li>
                            <li>@lang('home.reportage')</li>
                        </ul>
                    </div>
                    <button class="btn-home" href="">
                        Sfoglia i miei Album
                    </button>
                </div>
            </div>
            <div class="image-wrapper image-revert col">
                <img class="image" src="{{asset('assets/RA-95.jpg')}}" alt="photos">
            </div>
        </div>
        <div class="home-container row row-cols-lg-2 row-cols-1">
            <div class="image-wrapper col">
                <img class="image" src="{{asset('assets/RA-95.jpg')}}" alt="videos">
            </div>
            <div class="description-wrapper col">
                <div class="description p-5">
                    <h1 class="mb-3">@lang('home.videos-title')</h1>
                    <div class="lh-lg">
                        @lang('home.presentation')
                        <ul>
                            <li>@lang('home.weddings')</li>
                            <li>@lang('home.sessions')</li>
                            <li>@lang('home.reportage')</li>
                        </ul>
                    </div>
                    <button class="btn-home">
                        Scopri di più
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="services d-flex justify-content-center my-5">
        <h2>@lang('home.services')</h2>
    </div>
    <div class="rewiews d-flex justify-content-center my-5">
        <h2>@lang('home.review')</h2>
    </div>
    <x-link-matrimonio-site/>
@endsection
