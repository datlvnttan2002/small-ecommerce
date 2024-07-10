<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Category;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();
        $brandIds = Brand::pluck('id')->toArray();
        $product_name = $this->faker->words(random_int(2,6), true);
        return [
            'product_name' => $product_name,
            'cover_image'=>Str::slug($product_name),
            'describe' => $this->faker->sentence,
            'detail'=> $this->faker->text(300),
            'shipping_point'=> intval($this->faker->randomFloat(2,50,200)),
            'brand_id' => $this->faker->randomElement($brandIds),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}

