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
          ]);
          
        DB::table('menus')->insert([
           'menu_name' => '腕立て伏せ',
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'チンニング',
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'スクワット',
          ]);
        
        DB::table('menus')->insert([
           'menu_name' => 'アームカール',
          ]);
        
    }
}
