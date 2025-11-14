<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Shirts'],
            ['name' => 'Pants'],
            ['name' => 'Dresses'],
            ['name' => 'Shoes'],
            ['name' => 'Accessories'],
            ['name' => 'Outerwear'],
            ['name' => 'Shorts'],
            ['name' => 'Skirts'],
            ['name' => 'Hats'],
            ['name' => 'Socks'],
            ['name' => 'Jackets'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
