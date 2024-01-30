<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    const ID = 'album_id';
    const NAME = 'name';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Album::ID;

    protected $table = 'albums';

    public $timestamps = false;

    protected $fillable = [
        Album::NAME,
        Album::VISIBLE
    ];

    protected $visible = [
        Album::NAME
    ];

    protected $hidden = [
        Album::ID,
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
