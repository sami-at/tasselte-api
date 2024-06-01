<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'image' => 'path/to/image1.jpg',
                'price' => 50.00,
                'old_price' => 90.00,
                'discount' => '33%',
                'description' => 'Description for product 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'image' => 'path/to/image2.jpg',
                'price' => 30.00,
                'old_price' => 60.00,
                'discount' => '50%',
                'description' => 'Description for product 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
