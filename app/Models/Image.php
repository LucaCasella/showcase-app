<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    const ID = 'image_id';
    const ALBUM_ID = 'album_id';
    const NAME = 'name';
    const IMAGE_PATH = 'image_path';
    const COVER = 'cover';
    const CREATED_AT = 'created_path';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Image::ID;

    protected $table = 'images';

    public $timestamps = false;

    protected $fillable = [
        Image::NAME,
    ];

    protected $hidden = [
        Image::ALBUM_ID,
        Image::IMAGE_PATH,
        Image::COVER,
        Image::CREATED_AT,
        Image::UPDATED_AT,
        Image::DELETED_AT
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'image_id');
    }
}
