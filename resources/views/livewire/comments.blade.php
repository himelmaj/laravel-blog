<div>
    <h4 class="text-2xl font-semibold mb-2">Comments</h4>
    @auth
        <form>
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="px-4 py-2 bg-white rounded-t-lg ">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="4" class="w-full resize-none p-2 px-0 text-sm text-gray-900 bg-white border-0 focus:ring-0"
                        wire:model="content" placeholder="Write a comment..." required /></textarea>
                </div>
                <div class="flex items-center justify-between px-3 py-2 border-t ">
                    <button type="submit" wire:click.prevent="postContent"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Post comment
                    </button>
                </div>
            </div>
        </form>

    @else
        <a href="{{ route('login') }}" class="text-blue-500" wire:navigate>Login to comment</a>
    @endauth


    <div class="mt-6">

        @forelse ($this->comments as $comment)
            <div class="flex items-center space-x-4 my-4">
                <div class="flex-shrink-0">
                    @if ($comment->user->provider_avatar != null)
                        <img src="{{ $comment->user->provider_avatar }}" alt="{{ $comment->user->name }}" class="h-10 w-10 rounded-full">
                    @else
                        <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                            class="h-10 w-10 rounded-full">
                    @endif
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="#" class="hover:underline">{{ $comment->user->name }}</a>
                    </p>
                    <p class="text-sm text-gray-500">
                        <time datetime="2020-12-09">{{ $comment->created_at->diffForHumans() }}</time>
                    </p>
                </div>
            </div>
            <p class="mt-3 text-sm text-gray-900">
                {{ $comment->content }}
            </p>
        @empty
            <p class="text-gray-500">No comments yet</p>
        @endforelse

        <span>{{$this->comments->links()}}</span>

    </div>

</div>
