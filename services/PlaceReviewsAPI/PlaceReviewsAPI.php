<?php

namespace Service\PlaceReviewsAPI;

use App\Dtos\ReviewDto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class PlaceReviewsAPI implements PlaceReviewsAPIContract
{
    public function getReviews()
    {
        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json?
        fields=reviews
        &place_id=ChIJ1agcOZY3KxMRJH2_2sTZtxQ&reviews
        &reviews_sort=newest
        &reviews_no_translations=true
        &key=AIzaSyDuVvtn--7xc2Gt0OXQ8fO-rFYu1fGuRYo');

            if ($response->ok()) {
                $reviews = [];

                foreach ($response['result']['reviews'] as $review) {
                    $reviewDto = new ReviewDto();
                    $reviewDto->rating = $review['rating'];
                    $reviewDto->textReview = $review['text'];
                    $reviewDto->author = $review['author_name'];
                    $reviewDto->time = $review['relative_time_description'];

                    // Aggiungi l'oggetto ReviewDto all'array $reviews
                    $reviews[] = $reviewDto;
                }

                return $reviews;
            } else {
                return 'non ho trovato niente';
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
