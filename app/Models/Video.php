<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    const ID = 'id';
    const TITLE = 'title';
    const VIDEO = 'video';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Video::ID;

    protected $table = 'videos';

    public $timestamps = false;

    protected $fillable = [
        Video::TITLE,
        Video::VIDEO,
        Video::VISIBLE
    ];

    protected $visible = [
        Video::TITLE,
        Video::VIDEO,
        Video::VISIBLE
    ];

    protected $hidden = [
        Video::ID,
        Video::CREATED_AT,
        Video::UPDATED_AT,
        Video::DELETED_AT
    ];
}
