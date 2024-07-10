<?php
namespace Modules\Product\Repositories\Interface;

use App\Repositories\RepositoryInterface;

interface ProductFlashSaleRepositoryInterface extends RepositoryInterface
{
    public function getProductFlashSaleByFlashSaleId($flashSaleId,$perPage,$type);
}
