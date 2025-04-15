
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
                    <h5>{{isset($detail) ? 'Update' : 'Create'}} album detail</h5>
                    <form action="{{ route('clear-detail', $album->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Clear Detail
                        </button>
                    </form>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('index-album')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div
                            class="mb-5 relative block w-full p-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100 font-regular">
                            <strong>There were some problems with your input.</strong><br><br>
                            <ul>
                                @foreach($errors->all() as $errors)
                                    <li>{{$errors}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('includes.redirectMessage')

                    <form action="{{isset($detail) ? route('update-detail', $album->id) : route('store-detail', $album->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($detail))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group flex flex-col gap-2">
                                    <div class="mb-2">
                                        <label for="description_it"><strong>Description IT</strong></label><br>
                                        <textarea id="description_it" name="description_it" class="w-full">{{isset($detail) ? $detail->description_it : ''}}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description_en"><strong>Description EN</strong></label><br>
                                        <textarea id="description_en" name="description_en" class="w-full">{{isset($detail) ? $detail->description_en : ''}}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description_ru"><strong>Description RU</strong></label><br>
                                        <textarea id="description_ru" name="description_ru" class="w-full">{{isset($detail) ? $detail->description_ru : ''}}</textarea>
                                    </div>

                                    <div class="flex flex-col md:flex-row gap- justify-between">
                                        <!-- Owner Image -->
                                        <div class="mb-2">
                                            @if(isset($detail) && $detail->owner_image)
                                                <div>Owner Attuale</div>
                                                <div>(caricando un'immagine sovrasciverai quella attuale)</div>
                                                <img class="w-48 mb-2" src="{{ asset('AK-Photos/' . $album->type . '/' . $album->slug . '/' . $detail->owner_image_fhd) }}" alt="owner-image" loading="lazy">
                                            @endif
                                            <label for="owner_image">Owner Image</label><br>
                                            <input id="owner_image" type="file" name="owner_image" class="">
                                        </div>

                                        <!-- Location Image -->
                                        <div class="mb-2">
                                            @if(isset($detail) && $detail->location_image)
                                                <div>Location Attuale</div>
                                                <div>(caricando un'immagine sovrasciverai quella attuale)</div>
                                                <img class="w-48 mb-2" src="{{ asset('AK-Photos/' . $album->type . '/' . $album->slug . '/' . $detail->location_image_fhd) }}" alt="location-image" loading="lazy">
                                            @endif
                                            <label for="location_image">Location Image</label><br>
                                            <input id="location_image" type="file" name="location_image" class="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            type="submit">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
