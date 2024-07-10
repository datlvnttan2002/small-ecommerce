<?php

namespace Modules\Auth\Services;


use Modules\Cart\Repositories\Repository\CartRepository;


class CartService
{
    protected $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
    public function getCartByUserId($userId)
    {
        
    }
}
