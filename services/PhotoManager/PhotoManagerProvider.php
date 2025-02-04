<?php

namespace Service\PhotoManager;

use Illuminate\Support\ServiceProvider;

class PhotoManagerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PhotoManagerContract::class, PhotoManager::class);
    }
}
