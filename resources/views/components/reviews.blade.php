<div class="review-title">
    <h2>@lang('home.what-they-tell')</h2>
</div>
<div id="reviewsCarousel" class="carousel slide" data-bs-interval="3000" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($reviews as $index => $review)
            <div class="carousel-item @if ($index == 0) active @endif">
                <div class="card-review" id="review-{{$index}}">
                    <div class="review-author">
                        {{$review->author}}
                    </div>
                    <div class="review-rating">
                        <img src="{{ asset('rating/star-' . $review->rating . '.png') }}" alt="Rating: {{$review->rating}} stelle">
                    </div>
                    <div class="review-text">
                        {{$review->textReview}}
                    </div>
                    <div class="review-time">
                        {{$review->time}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<style>
    .review-title{
     text-transform: uppercase;
    }
    .card-review {
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin: 10px;
        height: 250px;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    .card-review.expanded {
        max-height: none;
    }
    .review-text {
        max-height: 100px; /* Adjust this height as needed */
        overflow: auto;
    }
    .review-author, .review-rating, .review-text, .review-time {
        margin-bottom: 10px;
    }
    .review-rating > img {
        height: 30px;
    }
    .expand-button {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
    }
</style>
