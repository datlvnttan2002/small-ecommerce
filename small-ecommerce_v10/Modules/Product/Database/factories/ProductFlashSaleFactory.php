<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\FlashSale;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductFlashSale;

class ProductFlashSaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\ProductFlashSale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_id = null;
        $flash_sale_id = null;
        do {
            $flashSaleIds = FlashSale::pluck('id')->toArray();
            $productIds = Product::pluck('id')->toArray();
            $product_id = $this->faker->randomElement($productIds);
            $flash_sale_id = $this->faker->randomElement($flashSaleIds);
        } while (ProductFlashSale::where('product_id', $product_id)
            ->where('flash_sale_id', $flash_sale_id)->exists()
        );

        return [
            'flash_sale_id' => $flash_sale_id,
            'product_id' => $product_id,
            'discount' => $this->faker->randomFloat(2, 0.07, 0.5)
        ];
    }
}
