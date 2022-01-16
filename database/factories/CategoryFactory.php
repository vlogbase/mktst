<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $category_name = $this->faker->unique()->sentence(2),
            'slug' => Str::slug($category_name),
            'image' =>  'category/holder.png',
        ];
    }
}
