@include('includes.redirectMessage')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <h5><strong>{{$album->title}}</strong></h5>
                    <h5><strong>{{$album->location}}</strong></h5>
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('create-photo', [$album->id])}}">Add Images</a>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('index-album')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="adm-photos-container p-6 text-gray-900 dark:text-gray-100">

                    @foreach ($photos as $photo)
                        <div class="adm-photo-item">
                            <img class="adm-photo" src="{{asset('album/photos/'.$album->id.'/'.$photo->name)}}" alt="{{$photo}}" loading="lazy">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
