<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\Product;
use Illuminate\Database\Seeder;
use Modules\Product\Database\Seeders\AttributeSeederTableSeeder;
use Modules\Product\Database\Seeders\BrandSeederTableSeeder;
use Modules\Product\Database\Seeders\CategorySeederTableSeeder;
use Modules\Product\Database\Seeders\CategoryTableSeeder;
use Modules\Product\Database\Seeders\ProductAttributeOptionSeederTableSeeder;
use Modules\Product\Database\Seeders\ProductAttributeSeederTableSeeder;
use Modules\Product\Database\Seeders\ProductSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CategoryTableSeeder::class);
        // $this->call(BrandSeederTableSeeder::class);
        // $this->call(AttributeSeederTableSeeder::class);
        // $this->call(ProductAttributeSeederTableSeeder::class);
        // $this->call(ProductAttributeOptionSeederTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
