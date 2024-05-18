<?php

namespace Tests\Feature;


use Service\PlaceReviewsAPI\Facades\PlaceReviewsAPIFacades;
use Tests\TestCase;

class PlaceAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_place_api(){
        $response = PlaceReviewsAPIFacades::getReviews();

        $this->assertNotNull($response);
    }
}
