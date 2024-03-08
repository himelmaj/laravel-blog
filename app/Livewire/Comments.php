<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class Comments extends Component
{

    use WithPagination;

    public Post $post;

    #[Rule('required|min:3|max:200')]
    public string $content;

    public function postContent()
    {
        if (auth()->guest()) return;
        

        $this->validateOnly('content');

        $this->post->comments()->create([
            'content' => $this->content,
            'user_id' => auth()->id()
        ]);

        $this->reset('content');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->post?->comments()->with('user')->latest()->paginate(5);
    }



    public function render()
    {
        return view('livewire.comments');
    }
}
