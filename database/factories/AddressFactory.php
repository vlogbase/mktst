<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'postcode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'district' => $this->faker->cityPrefix(),
            'county' => $this->faker->state(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'formatted_address' => $this->faker->address(),
        ];
    }
}
