<?php

namespace Service\InstagramAPI\Facades;

use Illuminate\Support\Facades\Facade;
use Service\InstagramAPI\InstagramAPIContract;
use Psr\Http\Message\StreamInterface;

/**
 * @method static getInstagramPhoto() :void;
 */

class InstagramAPIFacades extends Facade
{
    static function getFacadeAccessor(): string
    {
        return InstagramAPIContract::class;
    }
}
