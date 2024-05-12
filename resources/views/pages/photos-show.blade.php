@extends('public')

@section('content')
    <div class="py-12">
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center d-flex justify-content-center align-items-center">
                    <h4>{{$album->title}}</h4>
                </div>
            </div>
        </div>
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="photos-container p-6 text-gray-900 dark:text-gray-100" id="gallery">

                    @foreach ($photos as $photo)
                        <div class="photo-item">
                            <a href="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}" data-lightbox="gallery">
                                <img class="photo" src="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}"
                                     alt="{{$photo}}"
                                     data-fullimage="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}">
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
