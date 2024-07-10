<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\Repository\FlashSaleRepository;
use Modules\Product\Repositories\Repository\ProductFlashSaleRepository;

class ProductFlashSaleService
{
    protected $productFlashSaleRepository;
    public function __construct(ProductFlashSaleRepository $productFlashSaleRepository)
    {
        $this->productFlashSaleRepository = $productFlashSaleRepository;
    }

    public function getProductFlashSales($flashSaleId,$perPage,$user=null)
    {
        $type = !isset($user) ? 'guest' : "member_{$user->member_type}";
        return $this->productFlashSaleRepository->getProductFlashSaleByFlashSaleId($flashSaleId,$perPage,$type);
    }
}
