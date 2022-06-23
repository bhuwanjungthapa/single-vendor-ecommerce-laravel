<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $product = ['Huracán','Chiron'];
        for($i = 0;$i < count($product);$i++){
            DB::table('products')->insert([
                'created_by' =>1,
                'category_id' =>1,
                'subcategory_id' =>1,
                'title' => $product[$i],
                'slug' => strtolower($product[$i]),
                'discount' =>0,
                'stock' =>3,
                'quantity' =>3,
                'flash_key' =>1,
                'hot_key' =>1,
                'meta_title' => 'super car',
                'meta_keyword' =>'super car',
                'meta_description'=>'super car'
            ]);
        }
    }
}
