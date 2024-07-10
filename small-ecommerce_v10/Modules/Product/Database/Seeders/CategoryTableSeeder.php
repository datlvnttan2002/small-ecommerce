<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        $parentCategories = Category::factory()->count(10)->create();

        // Tạo danh mục con
        $parentCategories->each(function ($parent) {
            $random = random_int(0, 1);
            if ($random == 1) {
                Category::factory()->count(2)->create([
                    'parent_category_id' => $parent->id,
                ]);
            }
        });
    }
}
