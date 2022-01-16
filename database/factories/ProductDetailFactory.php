<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(50),
            'pack'  => '1x20kg',
            'featured' => $this->faker->boolean(10),
            'best_seller' => $this->faker->boolean(10),
            'new_arrival' => $this->faker->boolean(10),
            'special_offer' => $this->faker->boolean(10),
        ];
    }
}
