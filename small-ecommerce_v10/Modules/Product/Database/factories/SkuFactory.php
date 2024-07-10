<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Product;

class SkuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Sku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $guestPrice = $this->faker->numberBetween(100, 1000);
        $guestDiscount = $this->faker->randomFloat(2, 0, 0.5);
        // $productIds = Product::pluck('id')->toArray();
        return [
            'guest_price'=>$guestPrice,
            'guest_discount'=>$guestDiscount,
            'member_retail_price' => $guestPrice - 5,
            'member_retail_discount' => $guestDiscount + 0.02,
            'member_wholesale_price'=> $guestPrice - 7,
            'member_wholesale_discount'=> $guestDiscount + 0.03,
            // 'product_id'=>$this->faker->randomElement($productIds),
            'product_part_number'=>$this->faker->unique()->regexify('[A-Za-z0-9]{10}')
        ];
    }
}

