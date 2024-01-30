<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceManager extends Model
{
    use HasFactory;

    const ID = 'price_id';
    const NAME = 'name';
    const AMOUNT = 'amount';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = PriceManager::ID;

    protected $table = 'prices';

    public $timestamps = false;

    protected $fillable = [
        PriceManager::NAME,
        PriceManager::AMOUNT,
        PriceManager::VISIBLE
    ];

    protected $visible = [
        PriceManager::NAME,
        PriceManager::AMOUNT
    ];

    protected $hidden = [
        PriceManager::ID,
        PriceManager::VISIBLE,
        PriceManager::CREATED_AT,
        PriceManager::UPDATED_AT,
        PriceManager::DELETED_AT
    ];
}
