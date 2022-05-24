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
        $brands = ['Apple','Samsung','Oneplus','Google','Nike','Adidas'];
        for($i=0;$i < count($brands);$i++){
            DB::table('brands')->insert([
                'status' => '1',
                'created_by'=>1,
                'title'=>$brands[$i],
                'slug' => strtolower($brands[$i]),
                'rank' => $i+1
            ]);
        }
    }
}
