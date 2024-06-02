@extends('public')

@section('content')
    <div class="py-12">
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center d-flex justify-content-center align-items-center">
                    <h4>{{$album->title}}</h4>
                </div>
            </div>
        </div>
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="photos-container" id="gallery">

                        @foreach ($photos as $photo)
                            <a href="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}" class="photo-wrapper">
                                <img class="photo" src="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}" alt="{{$photo}}">
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/zoom/lg-zoom.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lightGallery(document.getElementById('gallery'), {
                selector: '.photo-wrapper',
                plugins: [lgZoom],
                speed: 500
            });
        });
    </script>
@endsection

