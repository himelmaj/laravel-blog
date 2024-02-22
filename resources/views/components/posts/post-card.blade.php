@props(['post', 'key'])

<a class="transition-all duration-75 ease-in-out h-full block relative top-0 hover:-top-2 
shadow-lg hover:shadow-xl bg-white rounded-xl overflow-hidden" data-test="article-card" href="{{ route('show', $post->slug) }}" wire:navigate wire:key="{{$key}}">
    <img class="squiggle object-cover" src="{{ $post->getImagePathAttribute() }}" alt="{{ $post->title }}">
    <div class="py-6 px-8 border-t border-gray-200">
        <h2 class="font-bold text-2xl leading-tight">{{ $post->title }}</h2>
        <p class="text-xs text-gray-600 mt-4 flex items-center">{{ $post->published_at->diffForHumans() }}</p>
    </div>
</a>

