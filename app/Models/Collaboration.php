<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const PRIVACY_ACCEPTED = 'privacy_accepted';
    const CURRICULUM = 'curriculum';
    const REPLIED = 'replied';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    const COMMENT = "comment";

    protected $primaryKey = Collaboration::ID;

    protected $table = 'collaborations';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        Collaboration::NAME,
        Collaboration::EMAIL,
        Collaboration::PHONE,
        Collaboration::CURRICULUM,
        Collaboration::PRIVACY_ACCEPTED,
        Collaboration::VISIBLE,
        Collaboration::COMMENT,
    ];

    protected $visible = [];

    protected $hidden = [
        Collaboration::ID,
        Collaboration::NAME,
        Collaboration::EMAIL,
        Collaboration::PHONE,
        Collaboration::PRIVACY_ACCEPTED,
        Collaboration::REPLIED,
        Collaboration::VISIBLE,
        Collaboration::CREATED_AT,
        Collaboration::UPDATED_AT,
        Collaboration::DELETED_AT
    ];
}
