<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a dummy category if none exists
        $category = Category::firstOrCreate(
            ['name' => json_encode(['en' => 'Default Category', 'fa' => 'دسته بندی پیش فرض'])],
            ['image' => null] // Assuming image is nullable and not immediately needed
        );

        $product1 = Product::create([
            'name' => 'Sample Product 1',
            'description' => 'This is the description for sample product 1.',
            'price' => 100000,
            'discount' => 10,
            'category_id' => $category->id,
        ]);

        ProductImage::create([
            'product_id' => $product1->id,
            'image' => 'products/X6NUNJVPzdDjHAimJz70ze2xYYmeI1XXV05U5d4a.jpg',
        ]);

        $product2 = Product::create([
            'name' => 'Sample Product 2',
            'description' => 'This is the description for sample product 2.',
            'price' => 150000,
            'discount' => 0,
            'category_id' => $category->id,
        ]);

        ProductImage::create([
            'product_id' => $product2->id,
            'image' => 'products/X6NUNJVPzdDjHAimJz70ze2xYYmeI1XXV05U5d4a.jpg',
        ]);
    }
}
