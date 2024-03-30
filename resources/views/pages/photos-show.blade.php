@extends('public')

@section('content')
    <div class="py-12">
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center d-flex justify-content-center align-items-center">
                    <h4>{{$album->title}}</h4>
                </div>
            </div>
        </div>
        <div class="max-w-10 mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="photos-container p-6 text-gray-900 dark:text-gray-100">

                    @foreach ($photos as $photo)
                        <div class="photo-item">
                            <img class="photo" src="{{asset('storage/photos/'.$album->id.'/'.$photo->name)}}"
                                 alt="{{$photo}}"
                                 data-fullimage="{{asset('storage/photos/'.$album->id.'/'.$photo->name)}}"
                                 onclick="showFullImage(this)">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function showFullImage(img) {
        // Get photo's URL
        var fullImageUrl = img.dataset.fullimage;

        // Create an overlay for the photo in full screen
        var overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        overlay.style.zIndex = '9999';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';

        // Create tag img for the photo in full sreen
        var fullImageElement = document.createElement('img');
        fullImageElement.src = fullImageUrl;
        fullImageElement.alt = 'Full Size Image';
        fullImageElement.classList.add('full-image'); // Add CSS class

        // Add the photo to the overlay
        overlay.appendChild(fullImageElement);

        // Add the overlay to the body
        document.body.appendChild(overlay);

        // Add an event listener to close the overlay the user click on the photo in full sreen
        overlay.onclick = function () {
            document.body.removeChild(overlay);
        };
    }
</script>

