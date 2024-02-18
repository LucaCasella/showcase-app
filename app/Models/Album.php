<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    const ID = 'album_id';
    const TITLE = 'title';
    const COVER_PATH = 'cover_path';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Album::ID;

    protected $table = 'albums';

    public $timestamps = false;

    protected $fillable = [
        Album::TITLE,
        Album::COVER_PATH,
        Album::VISIBLE,
        Album::UPDATED_AT
    ];

    protected $visible = [
        Album::ID,
        Album::TITLE,
        Album::COVER_PATH
    ];

    protected $hidden = [
        Album::VISIBLE,
        Album::CREATED_AT,
        Album::UPDATED_AT,
        Album::DELETED_AT
    ];

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, 'image_id', 'album_id');
    }

    public function video(): HasMany
    {
        return $this->hasMany(Video::class, 'video_id', 'album_id');
    }
}
