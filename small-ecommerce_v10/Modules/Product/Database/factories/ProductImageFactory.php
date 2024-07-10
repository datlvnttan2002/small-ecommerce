<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Illuminate\Support\Str;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = null;
        $imageName = null;
        do {
            $productIds = Product::pluck('id')->toArray();
            $name = Str::slug($this->faker->words(random_int(2,6),true));
            $imageName = "{$name}.jpg";
        } while (
            ProductImage::where('product_id', $productId)
            ->where('image_name', $imageName)->exists()
        );

        return [
            'product_id' => $this->faker->randomElement($productIds),
            'image_name' => $imageName 
        ];
    }
}
