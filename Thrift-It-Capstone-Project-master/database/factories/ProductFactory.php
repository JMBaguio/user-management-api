<?php

namespace Database\Factories;

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
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'category_id' => \App\Models\Categories::factory(),
            'user_id' => \App\Models\User::factory(),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'image' => $this->faker->imageUrl(640, 480, 'products'),
            'qty' => $this->faker->numberBetween(1, 100),
            'approval_status' => $this->faker->randomElement(['approved', 'pending']),
            'listingtype' => $this->faker->randomElement(['for sale', 'for rent']),
            'status' => $this->faker->randomElement(['available', 'sold']),
            'created_at' => now(),
            'updated_at' => now(),
               
        ];
    }
}
