<?php

namespace Modules\Shipping\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingMethod extends Model
{
    use HasFactory;
    public $table = 'shipping_methods';
    protected $fillable = [
        'shipping_method_name',
        'expense',
        'discount',
        'delivery_time',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Shipping\Database\factories\ShippingMethodFactory::new();
    }
}
