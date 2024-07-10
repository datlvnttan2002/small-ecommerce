<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Attribute;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;

class ProductAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\ProductAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_id = null;
        $attribute_id = null;
        do {
            $attributeIds = Attribute::pluck('id')->toArray();
            $productIds = Product::pluck('id')->toArray();
            $product_id = $this->faker->randomElement($productIds);
            $attribute_id = $this->faker->randomElement($attributeIds);
        } while (ProductAttribute::where('product_id', $product_id)
            ->where('attribute_id', $attribute_id)->exists()
        );

        return [
            'attribute_id' => $attribute_id,
            'product_id' => $product_id,
        ];
    }
}
