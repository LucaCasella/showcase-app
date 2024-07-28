<?php

namespace Service\InstagramAPI\Facades;

use Illuminate\Support\Facades\Facade;
use Service\InstagramAPI\InstagramAPIContract;
use Psr\Http\Message\StreamInterface;

/**
 * @method static getInstagramPhotos() :void;
 * @method static getUserID() :void;
 */

class InstagramAPIFacades extends Facade
{
    static function getFacadeAccessor(): string
    {
        return InstagramAPIContract::class;
    }
}
