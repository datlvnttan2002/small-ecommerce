<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    public $table = 'brands';
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\BrandFactory::new();
    }
}
