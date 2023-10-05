<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Part;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
  //index.blade.php
    public function main_index(Post $post)
    {
      $today = now()->format('Y-m-d');
      $user = Auth::id();
      $menuday = now();
      $posts = Post::whereDate('created_at', '2023-10-5')
        ->where('user_id', $user)
        ->get();
      
        return view('posts.index')->with([
          'posts' => $posts,
          'today' => $today,
        ]);
    }
  
    public function index(Post $post,Request $request)
    {
      $today = $request->query('date');
      $user = Auth::id();
      $posts = Post::whereDate('created_at', $today)
        ->where('user_id', $user)
        ->get();
        
        return view('posts.index')->with([
          'posts' => $posts,
          'today' => $today,
        ]);
    }
    
    public function getEvents(Post $post, Request $request)
    {
      $date = $post->getDate();
      
      return [
            [
                'start' => $date,
            ],
            [
                'start' => '2023-09-20',
            ],
            [
                'start' => '2023-09-30',
                'color' => '#ff44cc',
            ],
          ];
      
      // $start_date = $post->created_at;
      // $end_date = $post->created_at;
      
      // dd($start_date);
      
      // return Post::query()
      //   ->select(
      //     'start_date as start',
      //   )
      //   ->where('end_date', '>', $start_date)
      //   ->where('start_date', '<', $end_date)
      //   ->get();
    }
    
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    
  //user.blade.php
    public function users(Request $request, Post $post)
    {
      $part = new Part;
      $parts = $part->getLists();
      $searchWord = $request->input('searchWord');
      $partId = $request->input('partId');
      
      return view('posts.users')->with([
        'posts' => $post->getPaginate(),
        'parts' => $parts,
        'searchWord' => $searchWord,
        'partId' => $partId,
        'showModal' => false,
        ]);
    }
    
    public function searchmenu(Request $request)
    {
      $searchWord = $request->input('searchWord');
      $partId = $request->input('partId');
      
      if(isset($request)){//requestが来たとき
        $query = Post::query();
      
        if(isset($searchWord)) {//メニュー検索されたとき
          
          $query->whereHas('menu', function($q) use ($searchWord){
            $q->where('menu_name', 'like', '%' . self::escapeLike($searchWord) . '%');
          });
        }
        
        if(isset($partId)) {//部位検索されたとき
          $query->where('part_id', $partId);
        }
      }else{//requestがないとき
        $post = new Post;
        
        $query = $post;
      }
      
      $posts = $query->orderBy('created_at', 'desc')->paginate(15);
      
      $part = new Part;
      $parts = $part->getLists();
      
      return view('posts.users', [
          'posts' => $posts,
          'parts' => $parts,
          'searchWord' => $searchWord,
          'partId' => $partId
        ]);
    }
    
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
    
    public function modal()
    {
      return view('modal');
    }
    
    
  //create.blade.php
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
