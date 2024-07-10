<?php
namespace Modules\Cart\Repositories\Interface;

use App\Repositories\RepositoryInterface;

interface CartRepositoryInterface extends RepositoryInterface
{
    public function getCartByUserId($userId);
}
