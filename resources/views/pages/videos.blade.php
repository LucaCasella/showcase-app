@extends('public')

@section('content')
    <div class="videos-container">
        @foreach ($videos as $video)
            <div class="video-wrapper">
                <div class="video-info">
                    <h5 class="video-title">{{$video->title}}</h5>
                </div>
                <div class="video">
                    <video class="" width="100%" height="auto" controls controlsList="nodownload">
                        <source src="storage/videos/{{$video->video}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        @endforeach
    </div>
@endsection
