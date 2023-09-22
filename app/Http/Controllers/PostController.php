<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Part;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $today = now();
        $posts = Post::whereDate('created_at', $today)->get();
        
        return view('posts.index')->with(['posts' => $posts]);
    }
    
    public function create()
    {
        $chests = Menu::where("part_id", "1")->get();
        $backs = Menu::where("part_id", "2")->get();
        $legs = Menu::where("part_id", "3")->get();
        $arms = Menu::where("part_id", "4")->get();
        $shoulders = Menu::where("part_id", "5")->get();
        $others = Menu::where("part_id", "6")->get();
        
        return view('posts.create')->with(['chests' => $chests,
                                           'backs' => $backs,
                                           'legs' => $legs,
                                           'arms' => $arms,
                                           'shoulders' => $shoulders,
                                           'others' => $others,
        ]);
    }
    
    public function store(Request $request)
    {
      // dd($request->all());
      
      $postData = $request->input('post');

        foreach ($postData['menu_name'] as $key => $menuName) {
            $post = new Post();
            // $post->menu_name = $menuName;
            $post['menu_id'] = Menu::where("menu_name", $request['post']['menu_name'][$key])->first()->id;
            $post['part_id'] = Menu::where("menu_name", $request['post']['menu_name'][$key])->first()->part_id;
            $post->weight = $postData['weight'][$key];
            $post->reps = $postData['reps'][$key];
            $post->time = $postData['time'][$key];
            $post->distance = $postData['distance'][$key];
            $post->memo = $postData['memo'][$key];
            $post->user_id = Auth::id();
            $post->save();
        }
      
      return redirect('/posts/create');
    }
    
    public function store_menu(Request $request, Menu $menu)
    {
      $menuData = $request->input('menu');
      $menu->part_id = $menuData['part_id'];
      $menu->menu_name = $menuData['menu_name'];
      $menu->save();
      
      return redirect('/posts/create');
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
     public function menu_delete(Menu $menu)
    {
        $menu->delete();
        return redirect('/posts/create');
    }
    
    
    
    // public function parts(Post $post, Parts $part)
    // {
    //     return view('posts.index')->with(['parts' => $part->get()]);
    // }
    
}
