<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const PRIVACY_ACCEPTED = 'privacy_accepted';
    const REPLIED = 'replied';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = Contact::ID;

    protected $table = 'contacts';

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
        Contact::PRIVACY_ACCEPTED
    ];

    protected $visible = [];

    protected $hidden = [
        Contact::ID,
        Contact::REPLIED,
        Contact::CREATED_AT,
        Contact::UPDATED_AT,
        Contact::DELETED_AT
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
