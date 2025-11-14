<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'T-Shirts',
            'Jeans',
            'Dresses',
            'Jackets',
            'Sweaters',
            'Shorts',
            'Skirts',
            'Suits',          
            'Undergarments',
            'Footwear',
            'Bags',
            'Hats',
            'Shoes',
            'Socks',
            'Sandals',
            'Pants',
        ];
    
        return [
            'name' => $this->faker->randomElement($categories),
        ];
    }
    
}
