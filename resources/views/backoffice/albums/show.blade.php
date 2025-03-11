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
                    <button id="save-order"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Save Order
                    </button>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       href="{{route('index-album')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div id="sortable-gallery" class="adm-photos-container p-6 text-gray-900 dark:text-gray-100">

                    @foreach ($photos as $photo)
                        <div data-id="{{$photo->id}}" class="adm-photo-item relative cursor-move">
                            <img class="adm-photo" src="{{asset('albums/'.$album->slug.'/fhd/'.$photo->photo_fhd)}}"
                                 alt="{{$photo->name}}" loading="lazy">

                            <form action="{{route('destroy-photo', [$album->id,$photo->id])}}" method="post"
                                  class="photo-form absolute top-0 right-0 m-2">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 rounded"
                                        type="submit">
                                    X
                                </button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let sortable = new Sortable(document.getElementById("sortable-gallery"), {
            animation: 150,
            ghostClass: "sortable-ghost",
        });

        document.getElementById("save-order").addEventListener("click", function () {
            let orderedIds = [];
            document.querySelectorAll(".adm-photo-item").forEach((item, index) => {
                orderedIds.push({id: item.dataset.id, position: index + 1});
            });
            console.log(orderedIds)
            fetch("{{ route('update-photo-order') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({order: orderedIds})
            })
                .then(response => response.json())
                .then(data => alert("Ordine salvato con successo!"))
                .catch(error => console.error("Errore:", error));
        });
    });
</script>
