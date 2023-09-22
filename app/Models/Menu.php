<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Part;

class Menu extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
