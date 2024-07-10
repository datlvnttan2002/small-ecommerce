<?php

namespace Modules\Order\Entities;

use App\Models\ModelCompoundPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends ModelCompoundPrimaryKey
{
    use HasFactory;

    public $table = 'order_details';

    protected $primaryKey = ['order_id','sku_id'];
    protected $fillable = [
        'order_id',
        'sku_id',
        'price',
        'quantity',
        'feedback_rating',
        'feedback_image',
        'feedback_review',
        'feedback_status',
        'feedback_created_at'
    ];

    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderDetailFactory::new();
    }
}
