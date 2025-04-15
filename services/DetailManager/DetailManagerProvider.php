<?php

namespace Service\DetailManager;

use Illuminate\Support\ServiceProvider;

class DetailManagerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(DetailManagerContract::class, DetailManager::class);
    }
}
