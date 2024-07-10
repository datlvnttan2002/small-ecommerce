<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class ProductSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->create();
        // Model::unguard();
        // $detail = `Long-lasting mesh jacket with high-strength mesh that solves durability issues.\nConsidering that general mesh jackets have durability issues, we adopted "high-strength and high-breathability mesh" that is both breathable and strong.\nThe breathable mesh fabric is flexible and allows cool breezes to enter the jacket.\nManufactured in Daytona's original pattern, calculated to reduce pressure and friction resistance and improve mobility.\nIt is comfortable and suitable for riding without restricting your body movement.\nCoin pocket on left arm.Convenient for touring, such as for storing coins or toll tickets.\nEquipped with CE-compliant soft protectors on shoulders, elbows, back and chest as standard.(Back, Shoulder, Elbow, Chest: Lv1)\nMesh is partially adopted for the hoodWind passes through to reduce flapping.Can be rolled and fastened with a belt.\nReflective piping improves nighttime visibility\nFlexible and airy mesh for comfortable wear even on hot days.`;
        // Product::create([
        //     'product_name' => 'Half Mesh Hoodie',
        //     'cover_image' => 'half_mesh_hoodie_cover.jpg',
        //     'describe'=>"Color: Black/Gray\nFor motorcycles\nJacket\nspring and summer\nCE Standard\nSoft protector included\nmesh\nReassuring full protector specification",
        //     'shipping_point'=> 162,
        //     'detail'=>$detail,
        //     'category_id'=>4,
        //     'brand_id'=>1,
        // ]);
        // Product::create([
        //     'product_name' => 'SHUMA TREAD [Shoema Tread Black red]Helmet',
        //     'cover_image' => 'ShumaTread_left_BlackRed_TL_cover.jpg', 
        //     'describe'=>'',
        //     'shipping_point'=> 252,
        //     'detail'=>'',
        //     'category_id'=>6,
        //     'brand_id'=>2,
        // ]);
        // $this->call("OthersTableSeeder");
    }
}
