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
           'part_id' => 1,
           'menu_id' => 1,
           'user_id' => 1,
           'weight' => 50,
           'reps' => 10,
           'time' => new Datetime(),
           'distance' => 100,
           'memo' => 'あいうえお',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
        ]);
           
           DB::table('posts')->insert([
           'part_id' => 1,
           'menu_id' => 1,
           'user_id' => 1,
           'weight' => 50,
           'reps' => 8,
           'time' => new Datetime(),
           'distance' => 50,
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'part_id' => 1,
           'menu_id' => 2,
           'user_id' => 1,
           'weight' => 30,
           'reps' => 10,
           'time' => new Datetime(),
           'distance' => 50,
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'part_id' => 1,
           'menu_id' => 2,
           'user_id' => 1,
           'weight' => 30,
           'reps' => 10,
           'time' => new Datetime(),
           'distance' => 50,
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'part_id' => 2,
           'menu_id' => 3,
           'user_id' => 1,
           'weight' => 50,
           'reps' => 10,
           'time' => new Datetime(),
           'distance' => 50,
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           
        ]);
        
        DB::table('posts')->insert([
           'part_id' => 2,
           'menu_id' => 3,
           'user_id' => 1,
           'weight' => 50,
           'reps' => 9,
           'time' => new Datetime(),
           'distance' => 50,
           'memo' => '',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
        ]);
        
    }
}
