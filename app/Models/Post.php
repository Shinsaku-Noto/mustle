<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Part;
use App\Models\Menu;
use App\Models\User;

class Post extends Model
{
    use SoftDeletes;
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
    
    public function getPaginateByLimit(int $limit_count = 15)
    {
        return $this->paginate($limit_count);
    }
    
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
}
