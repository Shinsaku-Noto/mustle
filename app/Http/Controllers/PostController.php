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
    public function index(Request $request)
    {
      if(isset($requst)){
        $today = $request->query('date');
      }else{
        $today = now();
      }
      
      $user = Auth::id();
      $posts = Post::whereDate('created_at', $today)
                            ->where('user_id', $user)
                            ->get();
        
        return view('posts.index')->with(['posts' => $posts]);
    }
    
    public function users(Request $request)
    {
      $posts = Post::orderBy("created_at", "DESC")->get();
      
      $part = new Part;
      $parts = $part->getLists();
      $searchWord = $request->input('searchWord');
      $partId = $request->input('partId');
      
      return view('posts.users')->with([
                          'posts' => $posts->getPaginateByLimit(),
                          'parts' => $parts,
                          'searchWord' => $searchWord,
                          'partId' => $partId,
                          ]);
    }
    
    public function searchmenu(Request $request)
    {
      $searchWord = $request->input('searchWord');
      $partId = $request->input('partId');
      
      if(isset($request)){
        $query = Post::query();
      
        if (isset($searchWord)) {
          
          $query->whereHas('menu', function($q) use ($searchWord){
            $q->where('menu_name', 'like', '%' . self::escapeLike($searchWord) . '%');
          });
        }
        
        if(isset($partId)) {
          $query->where('part_id', $partId);
        }
      }else{
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
