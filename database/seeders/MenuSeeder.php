<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
           'menu_name' => 'ベンチプレス',
           'part_id' => 1,
          ]);
          
        DB::table('menus')->insert([
           'menu_name' => '腕立て伏せ',
           'part_id' => 1,
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'チンニング',
           'part_id' => 2,
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'スクワット',
           'part_id' => 3,
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'アームカール',
           'part_id' => 4,
          ]);
        
    }
}
