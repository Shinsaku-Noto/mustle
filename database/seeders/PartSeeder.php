<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
           'part_name' => '胸',
          ]);
         
        DB::table('parts')->insert([
           'part_name' => '背中',
          ]);
         
        DB::table('parts')->insert([
           'part_name' => '足',
          ]);
        
        DB::table('parts')->insert([
           'part_name' => '腕',
          ]);
          
        DB::table('parts')->insert([
           'part_name' => '肩',
          ]);
        
    }
}
