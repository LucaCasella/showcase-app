<?php

namespace Service\PlaceReviewsAPI\Facades;

use Illuminate\Support\Facades\Facade;
use Service\PlaceReviewsAPI\PlaceReviewsAPIContract;

/**
 * @method static getReviews() :void;
 */

class PlaceReviewsAPIFacades extends Facade
{
    static function getFacadeAccessor() :string
    {
        return PlaceReviewsAPIContract::class;
    }
}
