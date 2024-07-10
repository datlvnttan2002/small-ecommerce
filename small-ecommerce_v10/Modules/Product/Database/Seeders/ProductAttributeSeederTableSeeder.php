<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductAttribute;

class ProductAttributeSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::factory()->count(100)->create();
        // Model::unguard();
        // ProductAttribute::create([
        //     'product_id' => 1,
        //     'attribute_id' => 1,
        // ]);
        // ProductAttribute::create([
        //     'product_id' => 2,
        //     'attribute_id' => 1,
        // ]);
        // ProductAttribute::create([
        //     'product_id' => 2,
        //     'attribute_id' => 2,
        // ]);
        // // $this->call("OthersTableSeeder");
    }
}
