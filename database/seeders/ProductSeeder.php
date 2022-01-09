<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\ProductInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductDetail::truncate();
        ProductInfo::truncate();
        ProductImage::truncate();
        Category::truncate();
        Brand::truncate();

        $brands = Brand::factory(5)->create();

        Product::factory(100)
            ->has(ProductDetail::factory()->count(1))
            ->has(ProductInfo::factory()->count(4))
            ->has(ProductImage::factory()->count(4))
            ->create();

        $categories = Category::factory(3)
            ->has(
                Category::factory()->has(
                    Category::factory()->count(3)
                )->count(10)
            )
            ->create();


        Product::all()->each(function ($product) use ($brands) {
            $product->update([
                'brand_id' => $brands->random()->id
            ]);
        });

        // Populate the pivot table
        Product::all()->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
