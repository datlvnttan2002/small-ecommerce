<?php

namespace Modules\Product\Repositories\Repository;

use App\Repositories\EloquentRepository;
// use Modules\Product\Entities\ProductFlashSale;
use Modules\Product\Repositories\Interface\ProductFlashSaleRepositoryInterface;

class ProductFlashSaleRepository extends EloquentRepository implements ProductFlashSaleRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Product\Entities\ProductFlashSale::class;
    }
    public function getProductFlashSaleByFlashSaleId($flashSaleId, $perPage, $type = 'guest')
    {
        $data = $this->model->join('products', "{$this->model->table}.product_id", '=', 'products.id')
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->select(
                "flash_sale_id",
                'product_name',
                'cover_image',
                'shipping_point',
                'category_id',
                'brand_id',
                'products.id',
                "{$type}_price as price",
                "{$type}_discount as discount",
                'product_part_number',
                'products.average_rating',
                'products.total_rating',
            )
            ->where('flash_sale_id', $flashSaleId)
            ->where('skus.default', true)
            ->paginate($perPage);
        return $data;
    }
}
