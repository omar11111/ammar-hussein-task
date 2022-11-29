<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Comment extends Component
{
    public $item;
    public $text;
    public $reply;

    public $commentable_id;
    public $parent_id;
    public $commentable_type;

    public function mount()
    {
        $url = explode('/', Request::url());
        $this->commentable_id = $url[count($url) - 1];

        $currentRoute = explode('.', Route::currentRouteName());
        $this->commentable_type = $currentRoute[0];
    }

    public function showReplayAndSetParentId($parent_id)
    {
        $this->parent_id = $parent_id;

    }

    public function create()
    {

        $comment = $this->item->comments()->create(['text' => $this->text]);
        $this->text="";
    }

    public function createReply()
    {
        $reply=
        $this->item->comments()->create([
            'text' => $this->reply,
            'parent_id' => $this->parent_id,
        ]);

        $this->parent_id = 0;
        $this->reply="";
    }
    public function render()
    {
        // dd($this->parent_id);
        $this->item = Post::find($this->commentable_id);
        if ($this->commentable_type == 'profile') {
            $this->item = User::find($this->commentable_id);
        }
        // dd($item);
        return view('livewire.comment', ['item' => $this->item]);
    }
}
