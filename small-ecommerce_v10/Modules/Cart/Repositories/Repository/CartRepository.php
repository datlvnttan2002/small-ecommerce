<?php

namespace Modules\Cart\Repositories\Repository;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Repositories\Interface\CartRepositoryInterface;

class CartRepository extends EloquentRepository implements CartRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Cart\Entities\Cart::class;
    }
    public function getCartByUserId($userId)
    {
        $data = $this->model
        ->join('skus as s',"{$this->model->table}.sku_id",'=','s.id')
        ->join('products as p','s.product_id','=','p.id')
        ->where("{$this->model->table}.user_id", $userId)
        ->select(
            's.product_id',
            'p.product_name',
            'sku_id',
            'sku_id',
            'sku_id',
            'sku_id',
            'sku_id',
            'sku_id',
            "{$this->model->table}.quantity as cart_quantity"
        )
        ->get();
    }
    
}
