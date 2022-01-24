<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_name' => Str::random(7),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => Str::random(7),
            'surname' => Str::random(7),
            'phone' => $this->faker->phoneNumber(),
            'mobile' => $this->faker->phoneNumber(),
            'is_shipping' => 1,
            'is_billing' => 1
        ];
    }
}
