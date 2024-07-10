<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();
        $data = [
            'category_name' => $this->faker->word,
        ];
        $random = random_int(0,1);
        if(count($categoryIds) > 0 && $random === 1)
        {
            $data['parent_category_id'] = $this->faker->randomElement($categoryIds);
        }
        return $data;
    }
}

