<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Part;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {
        $today = now();
        $posts = Post::whereDate('created_at', $today)->get();
        
        return view('posts.index')->with(['posts' => $posts]);
    }
    
    // public function parts(Post $post, Parts $part)
    // {
    //     return view('posts.index')->with(['parts' => $part->get()]);
    // }
    
}
