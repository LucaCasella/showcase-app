<?php

namespace Tests\Feature;

use Service\InstagramAPI\Facades\InstagramAPIFacades;
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
        $response = InstagramAPIFacades::getInstagramPhotos();

        $this->assertNotNull($response);
    }
}
