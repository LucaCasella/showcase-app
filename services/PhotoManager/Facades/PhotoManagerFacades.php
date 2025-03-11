<?php

namespace Service\PhotoManager\Facades;

use Illuminate\Support\Facades\Facade;
use Service\PhotoManager\PhotoManagerContract;

/**
 * @method static store($request, $album_id);
 * @method static update($request, $album_id);
 * @method static delete($request, $album_id, $photo_id);
 * @method static updateOrder($request);
 */
class PhotoManagerFacades extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PhotoManagerContract::class;
    }
}
