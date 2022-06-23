<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = ['trend','hot','new'];
        for($i = 0;$i < count($tag);$i++){
            DB::table('tags')->insert([
                'created_by' =>1,
                'title' => $tag[$i],
                'slug' => strtolower($tag[$i])
            ]);
        }
    }
}
