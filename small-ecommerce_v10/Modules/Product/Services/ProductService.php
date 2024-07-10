<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\Repository\ProductRepository;

class ProductService
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function all()
    {
        return $this->productRepo->all(perPage:config('config.perPage'));
    }
    public function getProductByTag($tag,$user)
    {
        $perPage = config('config.perPage');
        $type = !isset($user) ? 'guest' : "member_{$user->member_type}";
        switch ($tag) {
            case 'new':
                return $this->productRepo->getNewProducts($perPage);
            case 'hot':
                return $this->productRepo->getHotProducts($perPage);
            default:
                return $this->productRepo->getSaleProducts($perPage,$type);
        }
    }
}
