@extends('public')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 gallery-container">
        @foreach ($albums as $album)
            <div class="max-w-7xl mx-auto album-container">
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <div class="cover-container">
                        <a href="{{route('photos-show', [$album->id])}}">
                            <img class="album-cover" src="storage/album_covers/{{$album->cover}}" alt="{{$album->title}}">
                            <div class="album-title-container hidden">
                                <h4 class="album-title hidden">{{$album->location}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
