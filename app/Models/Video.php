<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    const ID = 'video_id';
    const ALBUM_ID = 'album_id';
    const NAME = 'name';
    const VIDEO_PATH = 'video_path';
    const CREATED_AT = 'created_path';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Video::ID;

    protected $table = 'videos';

    public $timestamps = false;

    protected $fillable = [
        Video::NAME
    ];

    protected $visible = [
        Video::NAME
    ];

    protected $hidden = [
        Video::ID,
        Video::ALBUM_ID,
        Video::VIDEO_PATH,
        Video::CREATED_AT,
        Video::UPDATED_AT,
        Video::DELETED_AT
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'video_id');
    }
}
