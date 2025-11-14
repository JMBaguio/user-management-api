<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Categories;


class LandingRepository
{
    public function index()
    {
        $categories = Categories::all();
        $products = Product::with('category')
        ->where('status', 'available')
        ->latest()
        ->take(12)
        ->get();
        
        return [
            'products' => $products,
            'categories' => $categories
        ];
    }
}