<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['lamborghini','Bugatti','Ferrari','Tesla','Range Rover','BMW'];
        for($i=0;$i < count($brands);$i++){
            DB::table('brands')->insert([
                'created_by'=>1,
                'title'=>$brands[$i],
                'slug' => strtolower($brands[$i]),
                'rank' => $i+1
            ]);
        }
    }
}
