<x-app-layout>
    <section class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:1200px">
        <article class="flex flex-wrap gap-2">
            @if ($user->provider_avatar != null)
                <img src="{{ $user->provider_avatar }}" alt="" class=" w-40 h-40">
            @else
                <img src="{{ $user->profile_photo_url }}" alt="" class=" w-40 h-40">
            @endif
            <div class="">
                <h1 class="xl:text-7xl lg:text-7xl md:text-4xl sm:text-2xl text-5xl semi-bold text-blue-500">{{ $user->name  }}</h1>
                <p class="ml-1 text-sm text-blue-400 mt-2">{{ $user->email." ✨". $user->username }}</p>
            </div>
        </article>

        <article class="my-20">
            <h1 class="text-3xl font-bold my-5">Posts</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ($posts as $post)
                    <x-posts.post-card :post="$post" :key="$post->slug" />
                @endforeach
            </div>
        </article>
    </section>
</x-app-layout>
