<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Modules\Order\Enums\OrderStatus;
use Modules\Shipping\Entities\ShippingMethod;
use Modules\User\Entities\DeliveryAddress;
use Modules\User\Entities\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id')->toArray();
        $deliveryAddress = null;
        do {
            $userId = $this->faker->randomElement($userIds);
            $deliveryAddress = DeliveryAddress::where('user_id', $userId)->first();
            // Log::info($deliveryAddress->toJson());
        } while (!isset($deliveryAddress));
        $shippingMethods = ShippingMethod::all()->toArray();
        return [
            'payment_method' => $this->faker->word,
            'user_id' => $userId,
            'delivery_address' => json_encode($deliveryAddress),
            'shipping_method' => json_encode($this->faker->randomElement($shippingMethods)),
            'total_amount' => $this->faker->numberBetween(1),
            'total_point' => $this->faker->numberBetween(100, 30000),
            'status' => $this->faker->randomElement(OrderStatus::values()),
        ];
    }
}
