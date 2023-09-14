<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\Post;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
           'parts_id' => 1,
           'menus_id' => 1,
           'users_id' => '',
           'weight' => 50,
           'reps' => 10,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'parts_id' => 1,
           'menus_id' => 1,
           'users_id' => '',
           'weight' => 50,
           'reps' => 8,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'parts_id' => 1,
           'menus_id' => 2,
           'users_id' => '',
           'weight' => 30,
           'reps' => 10,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'parts_id' => 1,
           'menus_id' => 2,
           'users_id' => '',
           'weight' => 30,
           'reps' => 10,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'parts_id' => 2,
           'menus_id' => 3,
           'users_id' => '',
           'weight' => '',
           'reps' => 10,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'parts_id' => 2,
           'menus_id' => 3,
           'users_id' => '',
           'weight' => '',
           'reps' => 9,
           'time' => '',
           'distance' => '',
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
    }
}
