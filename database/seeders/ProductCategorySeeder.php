<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Create 5 categories
        $categories = Category::factory()->count(5)->create();

        // For each category, create 10 products (5 categories * 10 products = 50)
        $categories->each(function ($category) {
            Product::factory()->count(10)->create([
                'category_id' => $category->id,]);
        });
    }
}
