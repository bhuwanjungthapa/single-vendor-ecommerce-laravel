<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'created_by' => 1,
            'title' => 'color'
        ]);

        DB::table('attributes')->insert([
            'created_by'=> 1,
            'title' => 'size'
        ]);

    }
}
