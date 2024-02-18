<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

use App\Models\Post;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;


class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'asc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';
    
    public function setSort()
    {
        $this->sort = ($this->sort === 'asc') ? 'desc' : 'asc';
    }
    
    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->orderBy('published_at', $this->sort)
            ->when(Category::where('slug', $this->category)->first(), function ($query) {
                $query->withCategory($this->category);
            })
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(9);
    }

    public function render()
    {
        return view('livewire.post-list', [
            'sort' => $this->sort,
        ]);
    }
}
