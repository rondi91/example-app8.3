<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 0; $i < 5; $i++) {
            $names = [
                'Gear',
                'Clothing',
                'Shoes',
                'Diapering',
                'Feeding',
                'Bath',
                'Toys',
                'Nursery',
                'Household',
                'Grocery'
            ];
            $index = array_rand($names);
            $catname =  $names[$index];
            $slug = Str::slug(($i + 5) . ($names[$index]));
            $catslug = Str::slug($i . ($names[$index]));
            $catnamechild = $i . 'ch' . $names[$index];
            Category::create(
                [
                    'category_name' => $catname,
                    'category_slug' => $slug,
                    // 'children' => $catnamechild,
                ]
            );
        }
    }
}
