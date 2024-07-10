<?php

namespace Modules\User\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Enums\UserMemberType;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\User\Entities\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'fullname' => $this->faker->name,
            'nickname' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email,
            'password' => '123',
            'member_type' => $this->faker->randomElement(UserMemberType::values())
        ];
        $random = $this->faker->numberBetween(0, 1);
        if ($random === 1)
            $data['email_verified_at'] = $this->faker->dateTime();
        return $data;
    }
}
