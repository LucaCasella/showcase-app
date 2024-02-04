<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('create-album')}}">Add new album</a>
                </div>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @foreach ($albumss as $album)
{{--        @php--}}
{{--            dd($albums)--}}
{{--        @endphp--}}
        <div>{{$album->title}}</div>
        <div>{{$album->cover_path}}</div>
{{--        <div>--}}
{{--            <form action="{{route('album-destroy', $album->id)}}" method="post">--}}
{{--                <a class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{route('album-show')}}">Info</a>--}}
{{--                <a class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{route('album-show')}}">Edit</a>--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <butto class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</butto>--}}
{{--            </form>--}}
{{--        </div>--}}
    @endforeach


</x-app-layout>
