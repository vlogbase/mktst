<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(7),
            'type' => $this->faker->randomElement(['price', 'percentage']),
            'discount' => $this->faker->randomElement([10, 15, 20]),
        ];
    }
}
