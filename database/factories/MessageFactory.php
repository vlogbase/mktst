<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->name(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'phone' =>  '+44530391266',
            'subject' => $this->faker->sentence(2),
            'message' => $this->faker->text(1000),

        ];
    }
}
