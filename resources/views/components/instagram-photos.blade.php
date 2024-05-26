<div class="mb-5">
    <div class="mb-3">
{{--        <h2>@lang('home.instagram')</h2>--}}
    </div>
    <div id="ig-photo-container">
        @foreach($photos as $photo)
            <div class="instagram-container">
                <a href="{{ $photo['permalink'] }}" target="_blank">
                    <img src="{{ $photo['media_url'] }}" alt="Instagram Photo">
                </a>
            </div>
        @endforeach
    </div>
</div>
