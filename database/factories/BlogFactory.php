<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
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
            'text' =>  $this->faker->text(5000),
            'image' => 'upload/contents/holder.png',
        ];
    }
}
