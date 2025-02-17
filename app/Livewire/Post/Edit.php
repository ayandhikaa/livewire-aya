<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Edit extends Component
{
    public $postId;
    public $title;
    public $description;

    // Load the post details when the component is mounted
    public function mount($postId)
    {
        $this->postId = $postId;

        // Retrieve the post from the database
        $post = Post::find($this->postId);

        // Populate the properties with the post's current data
        if ($post) {
            $this->title = $post->title;
            $this->description = $post->description;
        }
    }

    // Method to update the post
    public function update()
    {
        // Validate the input
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the post and update it
        $post = Post::find($this->postId);
        if ($post) {
            $post->title = $this->title;
            $post->description = $this->description;
            $post->save();
        }

        // Optionally, redirect after update
        session()->flash('message', 'Post updated successfully!');
        return redirect()->route('posts.index'); // Change this to the route you want to redirect to
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
