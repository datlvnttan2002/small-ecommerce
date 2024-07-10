<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\Repository\FlashSaleRepository;

class FlashSaleService
{
    protected $flashSaleRepository;
    public function __construct(FlashSaleRepository $flashSaleRepository)
    {
        $this->flashSaleRepository = $flashSaleRepository;
    }

    public function all()
    {
        return $this->flashSaleRepository->all();
    }
    public function getFitFlashSale()
    {
        return $this->flashSaleRepository->getFitFlashSale();
    }
}
