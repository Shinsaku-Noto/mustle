<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Part;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Modal extends Component
{
    public $showModal = false;
    
    public Post $post;
 
    public function render()
    {
        $date = $this->post->created_at->format('m/d');
        $user = $this->post->user_id;
        $setMenus = Post::with('part')
            ->whereDate('created_at', $this->post->created_at)
            ->where('user_id', $user)
            ->get();
        
        return view('livewire.modal')->with([
            'post' => $this->post,
            'date' => $date,
            'setMenus' => $setMenus,
            ]);
    }
 
    public function openModal()
    {
        $this->showModal = true;
    }
 
    public function closeModal()
    {
        $this->showModal = false;
    }
}
