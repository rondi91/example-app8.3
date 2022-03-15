<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;

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
        DB::table('product_tags')->truncate();
        DB::table('category_product')->truncate();
        DB::table('color_product')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Brand::factory(10)->create();

        Product::factory(20)->create()->each(function (Product $products) {
            // add tags for products
            $tags = Tag::pluck('tag_id', 'tag_id')->toArray();
            $products->tags()->attach((array_rand($tags)));

            // add brand for
            $brand = Brand::pluck('brand_id', 'brand_id')->toArray();
            $products->brand()->attach(array_rand($brand));

            // add category for products
            $category = Category::pluck('category_id', 'category_id')->toArray();
            $products->categories()->attach(array_rand($category));

            // add colors for products
            $colors = Color::pluck('color_id', 'color_id')->toArray();
            $products->colors()->attach(array_rand($colors));
        });

        //
    }
}
