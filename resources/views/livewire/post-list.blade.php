<div class=" px-3 lg:px-7 py-6">

    <button class="text-gray-500 py-4 font-semibold flex items-center" wire:click="setSort">
        <x-sort-icon /><span class="ml-2"> Sort by: {{ $this->sort }}</span>
    </button>
    <div class="py-4">
        @if ($this->posts->isEmpty())
            <h4 class="font-semibold text-lg text-gray-500">No posts found for the search term '{{ $this->search }}'.</h4>
        @else
            @foreach ($this->posts as $post)
                <x-posts.post-item :post="$post" />
            @endforeach
        @endif

    </div>

    <div class="my-3">
        {{ $this->posts->links() }}
    </div>

</div>
