<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Emre Demirel',
            'email' => 'emre.demirel@savoycatering.co.uk',
            'password' => bcrypt('Dev.Test.2023'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
