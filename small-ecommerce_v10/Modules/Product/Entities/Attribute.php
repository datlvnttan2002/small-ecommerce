<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    public $table = 'attributes';

    protected $fillable = ['attribute_name'];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\AttributesFactory::new();
    }
}
