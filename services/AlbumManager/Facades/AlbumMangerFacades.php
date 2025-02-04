<?php

namespace Service\AlbumManager\Facades;

use Illuminate\Support\Facades\Facade;
use Service\AlbumManager\AlbumManagerContract;

/**
 * @method static store($request);
 * @method static update($request, $album_id);
 * @method static delete($request, $album_id);
 */
class AlbumMangerFacades extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AlbumManagerContract::class;
    }
}
