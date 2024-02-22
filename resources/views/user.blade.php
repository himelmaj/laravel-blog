<x-app-layout>
    <section class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:1200px">
        <article class="flex flex-wrap gap-2">
            <img src="{{ $user->profile_photo_url }}" alt="" class=" w-40 h-40">
            <div class="">
                <h1 class="text-7xl semi-bold text-blue-500">{{ $user->name }}</h1>
                <p class="ml-1 text-sm text-blue-400 mt-2">{{ $user->email }}</p>
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
