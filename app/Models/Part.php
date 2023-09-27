<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Menu;


class Part extends Model
{
    use HasFactory;
    
    public function getLists()
    {
        $parts = Part::pluck('part_name', 'id');
        
        return $parts;
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
