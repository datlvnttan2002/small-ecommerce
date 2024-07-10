<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sku extends Model
{
    use HasFactory;

    public $table = 'skus';
    protected $fillable = [
        'product_id',
        'guest_price', 
        'guest_discount', 
        'member_retail_price', 
        'member_retail_discount', 
        'member_wholesale_price',
        'member_wholesale_discount',
        'default',
        'product_part_number'
    ];
    protected $casts = [
        'default' => 'boolean',
    ];
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\SkuFactory::new();
    }
}
