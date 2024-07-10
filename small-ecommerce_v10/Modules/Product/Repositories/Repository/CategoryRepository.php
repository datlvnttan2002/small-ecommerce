<?php

namespace Modules\Product\Repositories\Repository;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Interface\CategoryRepositoryInterface;
// use Database\Factories\Product;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Product\Entities\Category::class;
    }
    public function getHotCategories($quantity)
    {
        $categories = $this->model->join('products as p', 'categories.id', '=', 'p.category_id')
            ->join('skus as s', 's.product_id', '=', 'p.id')
            ->join('order_details as od', 's.id', '=', 'od.sku_id')
            ->select('categories.id', 'categories.category_name', DB::raw('SUM(od.quantity) as total_quantity'))
            ->groupBy('categories.id', 'categories.category_name')
            ->having('total_quantity','>=',$quantity)
            ->get();
        return $categories;
    }
}
