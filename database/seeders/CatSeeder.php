<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['men','women','child'];
        for($i=0;$i<count($category);$i++){
            DB::table('categories')->insert([
                'created_by'=>1,
                'title' => $category[$i],
                'slug' => strtolower($category[$i]),
                'rank' => $i+1
            ]);
        }
    }
}
