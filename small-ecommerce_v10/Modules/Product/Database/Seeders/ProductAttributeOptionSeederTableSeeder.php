<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductAttributeOption;

class ProductAttributeOptionSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttributeOption::factory()->count(250)->create();
        // Model::unguard();
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>1,
        //     'option_name'=>'S'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>1,
        //     'option_name'=>'M'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>1,
        //     'option_name'=>'L'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>1,
        //     'option_name'=>'XL'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>1,
        //     'option_name'=>'2XL'
        // ]);

        // ProductAttributeOption::create([
        //     'product_attribute_id'=>2,
        //     'option_name'=>'S'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>2,
        //     'option_name'=>'M'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>2,
        //     'option_name'=>'L'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>2,
        //     'option_name'=>'XL'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>2,
        //     'option_name'=>'2XL'
        // ]);

        // ProductAttributeOption::create([
        //     'product_attribute_id'=>3,
        //     'option_name'=>'red'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>3,
        //     'option_name'=>'blue'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>3,
        //     'option_name'=>'green'
        // ]);
        // ProductAttributeOption::create([
        //     'product_attribute_id'=>3,
        //     'option_name'=>'white'
        // ]);
        // $this->call("OthersTableSeeder");
    }
}
