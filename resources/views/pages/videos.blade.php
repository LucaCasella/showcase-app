@extends('public')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 adm-videos-container">
        @foreach ($videos as $video)
            <div class="max-w-7xl mx-auto video-container">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="video-info">
                            <h5 class="video-title">{{$video->title}}</h5>
                        </div>
                        <div class="video-wrapper">
                            <video class="video" width="640" height="360" controls controlsList="nodownload">
                                <source src="storage/videos/{{$video->video}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
