<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderDetail;
use Modules\Order\Enums\OrderStatus;
use Modules\Product\Entities\Sku;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orderIds = Order::pluck('id')->toArray();

        $skuIds = Sku::pluck('id')->toArray();
        do {
            $skuId = $this->faker->randomElement($skuIds);
            $orderId = $this->faker->randomElement($orderIds);
        } while (OrderDetail::where('order_id', $orderId)
            ->where('sku_id', $skuId)->exists()
        );
        $data = [
            'order_id' => $orderId,
            'sku_id' => $skuId,
            'price' => $this->faker->numberBetween(1, 3000),
            'quantity' => $this->faker->numberBetween(1, 300),
        ];
        // $order = Order::find($orderId);
        if ($this->faker->numberBetween(1, 6)>3) {
            $feedback_rating = $this->faker->numberBetween(1, 5);
            $data['feedback_rating'] = $feedback_rating;
            $data['feedback_image'] = $this->faker->word;
            $data['feedback_review'] = $this->faker->words(random_int(5, 20), true);
            $data['feedback_status'] = ($this->faker->numberBetween(1, 5) > 2);
            $data['feedback_created_at'] = $this->faker->dateTime();
        }
        return $data;
    }
}
