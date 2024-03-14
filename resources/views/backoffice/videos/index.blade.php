<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Videos') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('create-video')}}">Add new video</a>
                </div>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 relative block w-full p-4 text-base leading-5 text-white bg-green-500 rounded-lg opacity-100 font-regular">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 adm-videos-container">
        @foreach ($videos as $video)
            <div class="max-w-7xl mx-auto video-container">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="video-info">
                            <h5 class="video-title">{{$video->title}}</h5>
                            <form action="{{route('destroy-video', [$video->id])}}" method="post" class="video-form">
                                <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                                   href="{{route('edit-video', [$video->id])}}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                    Delete
                                </button>
                            </form>
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

</x-app-layout>
