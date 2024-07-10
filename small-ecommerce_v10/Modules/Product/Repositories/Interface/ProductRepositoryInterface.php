<?php
namespace Modules\Product\Repositories\Interface;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getNewProducts($perPage,$member_type = 'guest');
    public function getHotProducts($perPage,$member_type = 'guest');
    public function getSaleProducts($perPage,$member_type = 'guest');
}
