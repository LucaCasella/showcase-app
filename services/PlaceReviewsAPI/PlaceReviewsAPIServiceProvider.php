<?php

namespace Service\PlaceReviewsAPI;

use Illuminate\Support\ServiceProvider;
use Service\InstagramAPI\InstagramAPI;
use Service\InstagramAPI\InstagramAPIContract;

class PlaceReviewsAPIServiceProvider extends ServiceProvider
{
    public function register() :void
    {
        $this->app->bind(PlaceReviewsAPIContract::class, PlaceReviewsAPI::class);
    }
}
