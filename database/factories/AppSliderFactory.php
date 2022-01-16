<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'mobilesliders/holder.png',
        ];
    }
}
