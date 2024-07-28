<div class="mb-5">
    <div class="review-title mb-3">
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
                        <div class="google-review">
                            <img src="{{ asset('assets/Google-Logo.png') }}" alt="Google Logo" class="google-logo">
                            <span>Google Reviews</span>
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
</div>
<style>
    .review-title{
     text-transform: uppercase;
    }
    .card-review {
        padding: 15px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: max-height 0.3s ease;
        min-height: 100px;
        max-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .review-text {
        flex-grow: 1;
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
    .google-review {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }
    .google-logo {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }
</style>
