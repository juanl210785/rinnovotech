<?php

namespace Database\Factories;

use App\Models\Product;
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
    public function definition()
    {
        return [
            'sku' => fake()->unique->numberBetween(100000, 999999),
            'name' => fake()->sentence(),
            'description' => fake()->sentence(),
            'image_path' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 1, 1000),
            'status' => fake()->randomElement([Product::ACTIVE, Product::INACTIVE]),
            'subcategory_id' => fake()->numberBetween(1, 632),
        ];
    }
}
