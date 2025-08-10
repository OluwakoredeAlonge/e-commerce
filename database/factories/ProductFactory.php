<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'product_name' => fake()->words(3, true),
            'category_id' => Category::factory(), // will create a new category if not provided
            'price' => fake()->randomFloat(2, 100, 10000),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'description' => fake()->sentence(),
        ];
    }
}
