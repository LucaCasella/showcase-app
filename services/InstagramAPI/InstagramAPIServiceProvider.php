<?php

namespace Service\InstagramAPI;

use Illuminate\Support\ServiceProvider;

class InstagramAPIServiceProvider extends ServiceProvider
{
    public function register() :void
    {
        $this->app->bind(InstagramAPIContract::class, InstagramAPI::class);
    }
}
