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

    protected $primaryKey = Collaboration::ID;

    protected $table = 'collaborations';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        Contact::NAME,
        Contact::EMAIL,
        Contact::PHONE,
        Contact::PRIVACY_ACCEPTED,
        Contact::VISIBLE
    ];

    protected $visible = [];

    protected $hidden = [
        Contact::ID,
        Contact::NAME,
        Contact::EMAIL,
        Contact::PHONE,
        Contact::PRIVACY_ACCEPTED,
        Contact::REPLIED,
        Contact::VISIBLE,
        Contact::CREATED_AT,
        Contact::UPDATED_AT,
        Contact::DELETED_AT
    ];
}
