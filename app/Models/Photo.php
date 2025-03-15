<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    const ID = 'id';
    const ALBUM_ID = 'album_id';
    const NAME = 'name';
    const PHOTO = 'photo';
    const PHOTO_FHD = 'photo_fhd';
    const VISIBLE = 'visible';
    const ORDER = 'order';
    const TYPE = 'type';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Photo::ID;

    protected $table = 'photos';

    public $timestamps = false;

    protected $fillable = [
        Photo::NAME,
        Photo::PHOTO,
        Photo::PHOTO_FHD,
        Photo::VISIBLE,
        Photo::ORDER,
        Photo::TYPE,
    ];

    protected $guarded = [
        Album::ID,
        Photo::ALBUM_ID,
    ];

    protected $visible = [
        Photo::NAME,
        Photo::PHOTO,
        Photo::PHOTO_FHD,
        Photo::VISIBLE,
        Photo::ORDER,
        Photo::TYPE,
    ];

    protected $hidden = [
        Photo::ID,
        Photo::ALBUM_ID,
        Photo::CREATED_AT,
        Photo::UPDATED_AT,
        Photo::DELETED_AT
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
