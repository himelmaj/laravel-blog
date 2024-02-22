<x-app-layout>

    @section('header-title')
        <div class="w-full text-center flex flex-col justify-center items-center my-44">
            <h1 class="xl:text-9xl lg:text-9xl md:text-9xl text-5xl text-blue-500 font-semibold">dev.dive</h1>
            <p class="text-2xl py-5 mx-auto text-blue-300 ">Explorations in the Code Universe</p>
            <a class="mt-4 inline-flex items-center px-4 py-2 bg-blue-300 border-2 rounded-md font-semibold
            text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 border-blue-500
           active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
           transition ease-in-out duration-150 h-full relative top-0 hover:-top-2 
           shadow-lg hover:shadow-xloverflow-hidden"
                href="{{route('blog')}}">Start Reading</a>
        </div>
    @endsection


    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold mx-4">Featured</h2>
            <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4 mx-3">

                @foreach ($featuredPosts as $post)
                    <x-posts.post-card :post="$post" :key="$post->slug"/>
                @endforeach

            </div>
        </div>

        <div class="flex justify-center items-center border-b p-5">
            <a class="text-center text-lg text-blue-500 font-semibold" href="{{route('blog')}}" wire:navigate.hover>See All</a>
        </div>

        <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold mx-4">Latest</h2>
        <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4 mx-3">

            @foreach ($latestPosts as $post)
                <x-posts.post-card :post="$post" :key="$post->slug"/>
            @endforeach

        </div>
        <a class="mt-10 block text-center text-lg text-blue-500 font-semibold" href="{{route('blog')}}" wire:navigate.hover>See All</a>
    </div>


</x-app-layout>
