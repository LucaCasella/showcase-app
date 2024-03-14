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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="contacts-title">Information Requests</h5>
                </div>
            </div>
        </div>
        <div class="requests-container max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h5 class="request-title mt-2">Contacted by</h5>
                <div class="p-6 text-gray-900 dark:text-gray-100 contacted-by">
                    @foreach($contacts as $contact)
                        <div class="contact-info">
                            <div class="contact-line">
                                <div class="contact-attribute">{{$contact->name}}</div>
                                <div class="contact-attribute">{{$contact->email}}</div>
                            </div>
                            <div class="contact-line">
                                <div class="contact-attribute">{{$contact->phone}}</div>
                                <div class="contact-attribute">{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</div>
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h5 class="request-title mt-2">Replied to</h5>
                <div class="p-6 text-gray-900 dark:text-gray-100 contacted-by">
                    @foreach($contacts as $contact)
                        <div class="contact-info">
                            <div class="contact-line">
                                <div class="contact-attribute">{{$contact->name}}</div>
                                <div class="contact-attribute">{{$contact->email}}</div>
                            </div>
                            <div class="contact-line">
                                <div class="contact-attribute">{{$contact->phone}}</div>
                                <div class="contact-attribute">{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</div>
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
