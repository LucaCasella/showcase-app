<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    const ID = 'id';
    const SLUG = 'slug';
    const TITLE = 'title';
    const LOCATION = 'location';
    const COVER = 'cover';
    const VISIBLE = 'visible';
    const ORDER = 'order';
    const TYPE = 'type';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Album::ID;

    protected $table = 'albums';

    public $timestamps = false;

    protected $fillable = [
        Album::TITLE,
        Album::LOCATION,
        Album::COVER,
        Album::VISIBLE,
        Album::ORDER,
        Album::TYPE,
        Album::UPDATED_AT,
    ];

    protected $guarded = [
        Album::ID,
    ];

    protected $visible = [
        Album::SLUG,
        Album::TITLE,
        Album::LOCATION,
        Album::COVER,
        Album::VISIBLE,
        Album::ORDER,
        Album::TYPE,
    ];

    protected $hidden = [
        Album::ID,
        Album::CREATED_AT,
        Album::UPDATED_AT,
        Album::DELETED_AT
    ];

    public function photo(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}
