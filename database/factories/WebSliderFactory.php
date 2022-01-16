<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'top_head' => $this->faker->sentence(2),
            'mid_head' => $this->faker->sentence(2),
            'image' => 'websliders/holder.png',
        ];
    }
}
