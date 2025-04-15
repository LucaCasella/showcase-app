<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    use HasFactory;

    const ID = 'id';
    const ALBUM_ID = 'album_id';
    const DESCRIPTION_IT = 'description_it';
    const DESCRIPTION_EN = 'description_en';
    const DESCRIPTION_RU = 'description_ru';
    const OWNER_IMAGE = 'owner_image';
    const OWNER_IMAGE_FHD = 'owner_image_fhd';
    const LOCATION_IMAGE = 'location_image';
    const LOCATION_IMAGE_FHD = 'location_image_fhd';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Detail::ID;

    protected $table = 'detail';

    public $timestamps = false;

    protected $fillable = [
        self::DESCRIPTION_IT,
        self::DESCRIPTION_EN,
        self::DESCRIPTION_RU,
        self::OWNER_IMAGE,
        self::OWNER_IMAGE_FHD,
        self::LOCATION_IMAGE,
        self::LOCATION_IMAGE_FHD,
        self::UPDATED_AT,
    ];

    protected $guarded = [
        Album::ID,
    ];

    protected $visible = [
        self::DESCRIPTION_IT,
        self::DESCRIPTION_EN,
        self::DESCRIPTION_RU,
        self::OWNER_IMAGE,
        self::OWNER_IMAGE_FHD,
        self::LOCATION_IMAGE,
        self::LOCATION_IMAGE_FHD,
    ];

    protected $hidden = [
        Detail::ID,
        Detail::ALBUM_ID,
        Detail::CREATED_AT,
        Detail::UPDATED_AT,
        Detail::DELETED_AT
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
