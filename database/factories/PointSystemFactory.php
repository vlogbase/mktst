<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PointSystemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'earn_coefficient' => 1,
            'spend_coefficient' => 0.1,
        ];
    }
}
