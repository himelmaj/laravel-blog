<x-app-layout>


    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:800px">

        <section>
            <h1 class="text-4xl font-bold text-left text-gray-900 mb-2">
                {{ $post->title }} </h1>
            <h4 class="text-sm text-zinc-500 "><a href="{{route('user', $post->author->email)}}" class="hover:text-zinc-800">{{$post->author->name}}</a>{{', '. $post->published_at->format('F j, Y') }}</h4>
            <img class=" shadow-sm rounded-md w-full mt-6" src="{{ $post->getImagePathAttribute() }}"
                alt="{{ $post->title }}">
        </section>

        <section class="mt-10">
            <div class="prose text-gray-900" style="max-width:100%;">
                {!! $post->body !!}
            </div>
        </section>

        <section class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-900"><h2>
        </section>

        <section class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-900">Comments</h2>
        </section>

    </article>
</x-app-layout>