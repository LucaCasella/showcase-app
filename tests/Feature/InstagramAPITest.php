<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Service\InstagramAPI\Facades\InstagramAPIFacades;
use Service\InstagramAPI\InstagramAPI;
use Tests\TestCase;

class InstagramAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_instagramAPI()
    {
        $response = InstagramAPIFacades::getInstagramPhoto();

        dd($response);
    }
}
