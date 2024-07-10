<?php

namespace Modules\User\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Entities\DeliveryAddress;
use Modules\User\Entities\User;

class DeliveryAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\User\Entities\DeliveryAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id')->toArray();
        $userId = $this->faker->randomElement($userIds);
        $deliveryAddress = DeliveryAddress::where('user_id', $userId)
            ->where('default', true)
            ->first();
        $default = isset($deliveryAddress) ? false : true;
        return [
            'user_id' => $userId,
            'fullname' => $this->faker->name(),
            'country' => $this->faker->country,
            'address_1' => $this->faker->streetAddress,
            'address' => $this->faker->address,
            'zip_code' => $this->faker->postcode,
            'phone_number' => $this->faker->phoneNumber(),
            'default' => $default,
        ];
    }
}
