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
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative block w-full p-4 mb-4 text-base leading-5 text-white bg-green-500 rounded-lg opacity-100 font-regular">
            <p>{{$message}}</p>
        </div>
    @elseif($message = \Illuminate\Support\Facades\Session::get('error'))
        <div
            class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative block w-full p-4 mb-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100 font-regular">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 adm-gallery-container">
        @foreach ($albums as $album)
            <div class="adm-album-container">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="adm-album-info">
                            <div class="flex- flex-col">
                                <h5>
                                    @switch($album->type)
                                        @case('weddings')
                                            Type: Matrimonio
                                            @break
                                        @case('locations')
                                            Type: Location
                                            @break
                                        @case('vendors')
                                            Type: Fornitore
                                            @break
                                        @default
                                            Type: N/D
                                    @endswitch
                                </h5>
                                <h5>Title: {{$album->title}}</h5>
                                <h5>Location: {{$album->location}}</h5>
                            </div>
                            <form action="{{route('destroy-album', [$album->id])}}" method="post" class="grid grid-cols-2 gap-2">
                                <a class="bg-green-500 hover:bg-green-700 text-center text-white font-bold py-2 px-4 rounded"
                                   href="{{route('show-album', [$album->id])}}">Photo</a>
                                <a class="bg-blue-500 hover:bg-blue-700 text-center text-white font-bold py-2 px-4 rounded"
                                   href="{{route('create-detail', [$album->id])}}">Details</a>
                                <a class="bg-yellow-500 hover:bg-yellow-700 text-center text-white font-bold py-2 px-4 rounded"
                                   href="{{route('edit-album', [$album->id])}}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <div class="adm-cover-container relative">
                            <img class="adm-album-cover" src="{{asset('AK-Photos/' . $album->type . '/' . $album->slug. '/' . $album->cover) }}" alt="{{$album->title}}" loading="lazy">
                            <form action="{{ route('toggle-highlight', $album->id) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" title="Evidenzia SI/NO" class="text-2xl">
                                    @if($album->highlight)
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="40px" width="40px" viewBox="0 0 50 50" xml:space="preserve">
                                            <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="40px" width="40px" viewBox="0 0 50 50" xml:space="preserve">
                                            <path style="fill:#bbbbbb;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                        </svg>
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
