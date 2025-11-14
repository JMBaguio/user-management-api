<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // 🧥 Clint’s Products (user_id = 4)
            [
                'user_id' => 4,
                'category_id' => 11, // Jackets
                'name' => 'NIKE Jordan Classic Camo Windbreaker',
                'description' => 'Size: Medium | Excellent condition | Complete tags | No issue | 23x28',
                'price' => 1800.00,
                'size' => 'M',
                'image' => 'products_images/jordan_camo.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 4,
                'category_id' => 11, // Jackets
                'name' => 'Air Jordan Essential Woven Jacket',
                'description' => 'Size: Medium | Excellent condition | Complete tags | No issue | 22.5x26.5',
                'price' => 1900.00,
                'size' => 'M',
                'image' => 'products_images/jordan_woven.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 4,
                'category_id' => 1, // Shirts
                'name' => 'Ralph Lauren USA Flag Bear Embroidered',
                'description' => 'Authentic Ralph Lauren Polo Bear embroidered design | Great condition | Size: M | No issue',
                'price' => 1300.00,
                'size' => 'M',
                'image' => 'products_images/ralph_bear.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 4,
                'category_id' => 6, // Outerwear
                'name' => 'Burberry Kensington Heritage Trench Coat',
                'description' => 'Luxury trench coat in great condition | Minimal wear, no issue | Timeless design',
                'price' => 4200.00,
                'size' => 'L',
                'image' => 'products_images/burberry_trench.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],

            // 👕 Regular User (user_id = 3)
            [
                'user_id' => 3,
                'category_id' => 1, // Shirts
                'name' => 'Lacoste Mens Polo Shirt Black',
                'description' => 'Good as new | Color rate: 10/10 | No issue | Size: M | 20.5x27',
                'price' => 1000.00,
                'size' => 'M',
                'image' => 'products_images/lacoste_black.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 3,
                'category_id' => 1, // Shirts
                'name' => 'Comme des Garçons Play Black Emblem Polo Grey',
                'description' => 'Excellent condition | No issue | Size: M',
                'price' => 1200.00,
                'size' => 'M',
                'image' => 'products_images/cdg_polo.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 3,
                'category_id' => 1, // Shirts
                'name' => 'Barcelona 2019-2020 Home Football Shirt Nike Soccer',
                'description' => 'Official Nike teamwear | No issue | Size: M',
                'price' => 950.00,
                'size' => 'M',
                'image' => 'products_images/barcelona_home.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 3,
                'category_id' => 11, // Jackets
                'name' => 'Milano Jacket',
                'description' => 'A stylish Milano jacket with a clean urban look | Perfect for layering | Size: M',
                'price' => 1450.00,
                'size' => 'M',
                'image' => 'products_images/milano_jacket.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],

            // 👖 Renzo’s Products (user_id = 5)
            [
                'user_id' => 5,
                'category_id' => 2, // Pants
                'name' => 'Carhartt Carpenter Pants',
                'description' => 'Durable Carhartt pants built for comfort and functionality | Size: 32',
                'price' => 1500.00,
                'size' => '32',
                'image' => 'products_images/carhartt_pants.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 5,
                'category_id' => 7, // Shorts
                'name' => 'Carhartt Shorts',
                'description' => 'Comfortable and durable Carhartt shorts made for warm weather and active days.',
                'price' => 950.00,
                'size' => 'M',
                'image' => 'products_images/carhartt_shorts.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 5,
                'category_id' => 1, // Shirts
                'name' => 'Ralph Lauren Stripe Polo',
                'description' => 'A classic Ralph Lauren striped polo made from soft cotton | Great for semi-casual wear',
                'price' => 1300.00,
                'size' => 'L',
                'image' => 'products_images/ralph_polo.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
            [
                'user_id' => 5,
                'category_id' => 11, // Jackets
                'name' => 'Jordan Jogger',
                'description' => 'Comfort fit jogger | Excellent condition | Size: M | No issue',
                'price' => 1300.00,
                'size' => 'M',
                'image' => 'products_images/jordan_jogger.jpg',
                'qty' => 1,
                'approval_status' => 'approved',
                'segment_id' => 1,
                'status' => 'available',
                'barangay_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
