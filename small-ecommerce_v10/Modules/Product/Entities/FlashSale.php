<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlashSale extends Model
{
    use HasFactory;

    public $table = 'flash_sales';
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\FlashSaleFactory::new();
    }
}
