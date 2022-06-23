<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcat = ['car', 'bike'];
        for ($i = 0; $i < count($subcat); $i++) {
            DB::table('subcategories')->insert([
                'created_by' => 1,
                'category_id' => 1,
                'title' => $subcat[$i],
                'slug' => strtolower($subcat[$i]),
                'rank' =>1,
                'meta_title' => 'super car',
                'meta_keyword' => 'super car',
                'meta_description' => 'super car'
            ]);
        }
    }
}
