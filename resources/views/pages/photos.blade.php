@extends('public')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 adm-gallery-container">
        @foreach ($albums as $album)
            <div class="max-w-7xl mx-auto album-container">
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="album-title">{{$album->title}}</h4>
                    </div>
                    <a href="{{route('photos-show', [$album->id])}}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="cover-container">
                                <img class="album-cover" src="storage/album_covers/{{$album->cover}}" alt="{{$album->title}}">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
