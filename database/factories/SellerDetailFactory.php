<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'vat_number' => '123123123',
            'registry_code' => '123123123',
        ];
    }
}
