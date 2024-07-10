<?php

namespace Modules\Shipping\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Shipping\Entities\ShippingMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shipping_method_name'=>$this->faker->words(4,true),
            'expense'=>$this->faker->numberBetween(0,200),
            'discount'=>$this->faker->randomFloat(null,0,0.5),
            'delivery_time'=>$this->faker->numberBetween(1,20),
        ];
    }
}
