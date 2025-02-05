<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Index extends Component
{
    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(5)
        ]);

    }
}
