
<x-app-layout>

    <x-slot name="header">
        <div class="d-flex flex-row justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Backoffice') }}
            </h2>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register
                new Admin</a>
        </div>
        @include('includes.redirectMessage')
    </x-slot>

    <div class="py-12">
        <div class="requests-container max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row gap-6">
                    <!-- Colonna 1 -->
                    <div class="w-full sm:w-1/2">
                        <h5 class="request-title mt-3">Contacted by</h5>
                        <div class="p-6 text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900 rounded-md">
                            @foreach($contacts as $contact)
                                <div class="contact-info mb-4 p-4 bg-white dark:bg-gray-800 rounded shadow">
                                    <div>Full name: {{$contact->name}}</div>
                                    <div>Email: {{$contact->email}}</div>
                                    <div>Phone: {{$contact->phone}}</div>
                                    <div>Date: {{$contact->created_at}}</div>
                                    <div class="of-wrap">Comment: {{$contact->comment}}</div>
                                    <form action="{{route('destroy-contact', [$contact->id])}}" method="post" class="contact-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2"
                                                type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Colonna 2 -->
                    <div class="w-full sm:w-1/2">
                        <h5 class="request-title mt-3">Collaboration request</h5>
                        <div class="p-6 text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900 rounded-md">
                            @foreach($collaborations as $collaboration)
                                <div class="contact-info mb-4 p-4 bg-white dark:bg-gray-800 rounded shadow">
                                    <div>Full name: {{$collaboration->name}}</div>
                                    <div>Email: {{$collaboration->email}}</div>
                                    <div>Phone: {{$collaboration->phone}}</div>
                                    <div>Date: {{$collaboration->created_at}}</div>
                                    <a href="{{ asset('Curriculum' . $collaboration->curriculum) }}" target="_blank">Show curriculum</a>
                                    <form action="{{route('destroy-collaboration',[$collaboration->id])}}" method="post" class="contact-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2"
                                                type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>


{{--<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--    <h5 class="request-title mt-3">Contacted by</h5>--}}
{{--    <div class="p-6 text-gray-900 dark:text-gray-100 contacted-by">--}}

{{--        @foreach($contacts as $contact)--}}
{{--            <div class="contact-info">--}}
{{--                <div class="">Full name: {{$contact->name}}</div>--}}
{{--                <div class="">Email: {{$contact->email}}</div>--}}
{{--                <div class="">Phone: {{$contact->phone}}</div>--}}
{{--                <div class="">Date: {{$contact->created_at}}</div>--}}
{{--                <div class="of-wrap">Comment: {{$contact->comment}}</div>--}}
{{--                <form action="{{route('destroy-contact', [$contact->id])}}" method="post" class="contact-form">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"--}}
{{--                            type="submit">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--    <h5 class="request-title mt-3">Collaboration request</h5>--}}
{{--    <div class="p-6 text-gray-900 dark:text-gray-100 contacted-by">--}}

{{--        @foreach($contacts as $contact)--}}
{{--            <div class="contact-info">--}}
{{--                <div class="">Full name: {{$contact->name}}</div>--}}
{{--                <div class="">Email: {{$contact->email}}</div>--}}
{{--                <div class="">Phone: {{$contact->phone}}</div>--}}
{{--                <div class="">Date: {{$contact->created_at}}</div>--}}
{{--                <div class="of-wrap">Comment: {{$contact->comment}}</div>--}}
{{--                <form action="{{route('destroy-contact', [$contact->id])}}" method="post" class="contact-form">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"--}}
{{--                            type="submit">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--</div>--}}
