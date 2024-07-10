<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'country',
        'address_1',
        'address',
        'zip_code',
        'phone_number',
        'default',
    ];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\DeliveryAddressFactory::new();
    }
}
