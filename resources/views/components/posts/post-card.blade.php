@props(['post'])

<article class="m-2">
    <a href="">
        <img class="w-full h-64 object-cover rounded-xl" src="{{ $post->image }}" alt="{{$post->title}}">
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <a href="" class="bg-violet-500 text-white rounded-xl px-3 py-1 text-sm mr-3">Category</a>

            <p class="text-gray-500 text-sm">{{$post->published_at->diffForHumans()}}</p>
        </div>
        <a href="" class="text-xl font-bold text-zinc-800">{{$post->title}}</a>
    </div>


</article>