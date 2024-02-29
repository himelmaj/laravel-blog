@props(['post', 'key'])

<a {{ $attributes }} class="transition-all duration-75 ease-in-out h-full block relative top-0 hover:-top-2 shadow-lg hover:shadow-xl 
        bg-white rounded-md overflow-hidden mb-10 " href="{{ route('show', $post->slug) }}" wire:navigate wire:key="{{$key}}">
    <div class="article-body grid grid-cols-12 gap-3 items-start">

        <div class=" col-span-3 flex items-center p-2">
                <img class="squiggle object-cover rounded-lg" src="{{ $post->getImagePathAttribute() }}"
                    alt="{{ $post->title }}">
        </div>


        <div class="col-span-8">

            <div class="flex py-3 text-sm items-center">
                @if ($post->author->provider_avatar != null)
                    <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->provider_avatar }}" alt="Profile avatar {{ $post->author->name }}">
                
                @else
                    <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="Profile avatar {{ $post->author->name }}">
                @endif
                {{-- <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="Profile avatar {{ $post->author->name }}"> --}}
                <span class="mr-1 text-xs">{{ $post->author->name }}</span>
                <span class="text-gray-500 text-xs">{{ $post->published_at->diffForHumans() }}</span>
            </div>

            <h2 class="text-xl font-bold text-gray-900">
                    {{ $post->title }}
            </h2>

            <div>
                <p class="mt-2 text-base text-gray-700">
                    {!! $post->getExcerptAttribute() !!}
                </p>
            </div>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read</span>
                </div>
                {{-- <div>
                    <a class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 text-gray-600 hover:text-gray-900">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <span class="text-gray-600 ml-2">
                            1
                        </span>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</a>


<a href="">


</a>
