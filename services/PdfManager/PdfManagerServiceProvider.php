<?php

namespace Service\PdfManager;

use Carbon\Laravel\ServiceProvider;

class PdfManagerServiceProvider extends ServiceProvider
{
     public function register(): void
     {
         $this->app->bind(PdfManagerContract::class, PdfManager::class);
     }
}
