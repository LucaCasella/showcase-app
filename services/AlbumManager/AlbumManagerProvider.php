<?php

namespace Service\AlbumManager;

use Illuminate\Support\ServiceProvider;

class AlbumManagerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AlbumManagerContract::class, AlbumManager::class);
    }
}
