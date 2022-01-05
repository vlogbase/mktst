<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $product_name = $this->faker->sentence(2),
            'slug' => Str::slug($product_name),
            'sku' => 'sku-' . $this->faker->randomFloat(2, 1, 100000),
            'unit_price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->randomFloat(2, 1, 100),
            'per_unit' => $this->faker->randomFloat(1, 1, 10),
        ];
    }
}
