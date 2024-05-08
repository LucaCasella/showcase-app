<x-app-layout>

    <x-slot name="header">
        <div class="d-flex flex-row justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Backoffice') }}
            </h2>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register
                new Admin</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="requests-container max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h5 class="request-title mt-3">Contacted by</h5>
                <div class="p-6 text-gray-900 dark:text-gray-100 contacted-by">

                    @foreach($contacts as $contact)
                        <div class="contact-info">
                            <div class="">Full name: {{$contact->name}}</div>
                            <div class="">Email: {{$contact->email}}</div>
                            <div class="">Phone: {{$contact->phone}}</div>
                            <div class="">Date: {{$contact->created_at}}</div>
                            <div class="">Comment: {{$contact->comment}}</div>
                            <form action="{{route('destroy-contact', [$contact->id])}}" method="post" class="contact-form">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
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

</x-app-layout>
