{{--<div class='sk-ww-google-reviews my-5' data-embed-id='25394429'></div>--}}
<div>
    @foreach ($reviews as $review)
        <div>
            {{$review->author}}
        </div>
        <div>
            {{$review->rating}}
        </div>
        <div>
            {{$review->textReview}}
        </div>
        <div>
            {{$review->time}}
        </div>
    @endforeach
</div>
