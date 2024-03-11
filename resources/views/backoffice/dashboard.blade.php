<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Backoffice') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Website visits count:
                </div>
                <div class="website-counter"></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 info-container">
                    <h1 class="request-title mb-5"><strong>Information Requests</strong></h1>
                    <div>
                        @foreach($contacts as $contact)
                            <div class="contact-info">
                                <div class="contact-attribute">{{$contact->name}}</div>
                                <div class="contact-attribute">{{$contact->email}}</div>
                                <div class="contact-attribute">{{$contact->phone}}</div>
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
