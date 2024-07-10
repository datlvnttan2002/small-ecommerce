<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\Repository\CategoryRepository;
use Modules\Product\Repositories\Repository\ProductRepository;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        return $this->categoryRepository->all(perPage:config('config.perPage'));
    }
    
    public function getHotCategories()
    {
        $quantity = config('config.quantityPurchasedCalledHot');
        return $this->categoryRepository->getHotCategories(1000);
    }
    // public function getProductByTag($tag,$user)
    // {
    //     $perPage = config('config.perPage');
    //     $type = !isset($user) ? 'guest' : "member_{$user->member_type}";
    //     switch ($tag) {
    //         case 'new':
    //             return $this->productRepo->getNewProducts($perPage);
    //         case 'hot':
    //             return $this->productRepo->getHotProducts($perPage);
    //         default:
    //             return $this->productRepo->getSaleProducts($perPage,$type);
    //     }
    // }
}
