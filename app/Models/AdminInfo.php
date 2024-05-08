<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const ADDRESS = 'address';
    const VAT = 'vat';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = AdminInfo::ID;

    protected $table = 'admin_info';

    public $timestamps = false;

    protected $fillable = [
        AdminInfo::NAME,
        AdminInfo::EMAIL,
        AdminInfo::PHONE,
        AdminInfo::ADDRESS,
        AdminInfo::VAT
    ];

    protected $visible = [
        AdminInfo::NAME,
        AdminInfo::EMAIL,
        AdminInfo::PHONE,
        AdminInfo::ADDRESS,
        AdminInfo::VAT
    ];

    protected $hidden = [
        AdminInfo::ID,
        AdminInfo::CREATED_AT,
        AdminInfo::UPDATED_AT,
        AdminInfo::DELETED_AT
    ];
}
