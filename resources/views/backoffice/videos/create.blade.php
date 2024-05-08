<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Videos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <h5>Create a new video</h5>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('index-video')}}">Back</a>
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

                    <form action="{{route('store-video')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="mb-2">
                                        <label for="title"><strong>Video Title</strong></label><br>
                                        <input id="title" type="text" name="title" class="peer h-full w-full border-b border-blue-gray rounded-[7px]" placeholder="Title">
                                    </div>
                                    <div class="mb-2">
                                        <label for="yt_video_id"><strong>YouTube Video ID</strong></label><br>
                                        <input id="yt_video_id" type="text" name="yt_video_id" class="peer h-full w-full border-b border-blue-gray rounded-[7px]" placeholder="ID">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
