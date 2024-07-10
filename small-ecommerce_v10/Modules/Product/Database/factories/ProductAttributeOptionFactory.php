<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeOption;

class ProductAttributeOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\ProductAttributeOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $optionName = '';
        $productName = null;
        do {
            $productAttributeIds = ProductAttribute::pluck('id')->toArray();
            $optionName = $this->faker->words(random_int(2,7), true);
            $productAttributeId = $this->faker->randomElement($productAttributeIds);
        } while (ProductAttributeOption::where('product_attribute_id', $productAttributeId)
            ->where('option_name', $optionName)->exists()
        );

        // $attributeIds = Attribute::pluck('id')->toArray();
        
        return [
            'product_attribute_id'=>$this->faker->randomElement($productAttributeIds),
            'option_name'=>$optionName,
        ];
    }
}

