<?php

namespace Modules\Product\Repositories\Repository;

use App\Repositories\EloquentRepository;
use Closure;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;
// use Database\Factories\Product;
use Modules\Product\Repositories\Interface\ProductRepositoryInterface;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Product\Entities\Product::class;
    }
    public function getNewProducts($perPage,$member_type = 'guest')
    {
        return $this->queryJoinSku($perPage, $member_type,function($query) use($member_type){
            return $query->whereRaw("DATEDIFF(CURRENT_DATE, {$this->model->table}.created_at) <= 7");
        });
    }
    public function getHotProducts($perPage,$member_type = 'guest')
    {
    }
    public function getSaleProducts($perPage, $member_type = 'guest')
    {
        return $this->queryJoinSku($perPage, $member_type,function($query) use($member_type){
            return $query->where("{$member_type}_discount", '>', 0);
        });
    }
    protected function queryJoinSku($perPage, $member_type = 'guest', Closure $queryWhere = null)
    {
        $query =  $this->model
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->select(
                "{$this->model->table}.id",
                "{$this->model->table}.product_name",
                "{$this->model->table}.cover_image",
                "{$this->model->table}.shipping_point",
                "{$this->model->table}.category_id",
                "{$this->model->table}.brand_id",
                "{$this->model->table}.average_rating",
                "{$this->model->table}.total_rating",
                DB::raw("AVG(skus.{$member_type}_price) as price"),
                DB::raw("MIN(skus.{$member_type}_price) as min_price"),
                DB::raw("MAX(skus.{$member_type}_price) as max_price"),
                DB::raw("MAX(skus.{$member_type}_discount) as discount")
            );
        if (isset($queryWhere))
            $query = $queryWhere($query);
        return $query->groupBy(
            "{$this->model->table}.id",
            "{$this->model->table}.product_name",
            "{$this->model->table}.cover_image",
            "{$this->model->table}.shipping_point",
            "{$this->model->table}.category_id",
            "{$this->model->table}.brand_id",
            "{$this->model->table}.average_rating",
            "{$this->model->table}.total_rating",
        )
            ->paginate($perPage);
    }
    
    protected function getSelectColumns($member_type)
    {
        return [
            'product_name',
            'cover_image',
            'shipping_point',
            'category_id',
            'brand_id',
            "{$this->model->table}.id",
            "{$member_type}_price as price",
            "{$member_type}_discount as discount",
            'product_part_number'
        ];
    }
}
