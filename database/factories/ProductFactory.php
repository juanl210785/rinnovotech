<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    
    public function definition()
    {
        return [
            'sku' => fake()->numberBetween(100000, 999999),
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'image_path' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 20, 300),
            'status' => fake()->randomElement([Product::ACTIVE, Product::INACTIVE]),
            'subcategory_id' => fake()->numberBetween(1, 632),
        ];
    }
}
