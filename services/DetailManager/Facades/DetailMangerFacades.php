<?php

namespace Service\DetailManager\Facades;

use Illuminate\Support\Facades\Facade;
use Service\DetailManager\DetailManagerContract;

/**
 * @method static store($request, $album_id);
 * @method static update($request, $album_id, $detail_id);
 * @method static clear($album_id);
 */
class DetailMangerFacades extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DetailManagerContract::class;
    }
}
