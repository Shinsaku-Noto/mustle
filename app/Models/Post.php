<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Part;
use App\Models\Menu;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'menu_id',
        'part_id',
        'user_id',
        'weight',
        'reps',
        'time',
        'distance',
        'memo',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    // public function getBy(){
    //     return $this::with('part')->get();
    // }
}
