<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('create-album')}}">Add new album</a>
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

    @foreach ($albums as $album)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                    <div>
                        <div>{{$album->title}}</div>
                        <img class="album-cover" src="storage/album_covers/{{$album->cover}}" alt="{{$album->title}}">
                    </div>
                    <div>
                        <form action="{{route('destroy-album', [$album->album_id])}}" method="post">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                               href="{{route('show-album', [$album->album_id])}}">Info</a>
                            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                               href="{{route('edit-album', [$album->album_id])}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
