<x-app-layout>

    @section('header-title')
        <div class="w-full text-center flex flex-col justify-center items-center my-44">
            <h1 class="xl:text-9xl lg:text-9xl md:text-9xl text-5xl text-blue-500 font-semibold">dev.dive</h1>
            <p class="text-2xl py-5 mx-auto text-gray-500 ">Explorations in the Code Universe</p>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md 
        font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
        transition ease-in-out duration-150"
                href="{{route('blog')}}">Start Reading</a>
        </div>
    @endsection


    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold mx-4">Featured Posts</h2>
            <div class="grid md:grid-cols-3 xl:grid-cols-3 sm:grid-cols-1 gap-3 mx-3">

                @foreach ($featuredPosts as $post)
                    <x-posts.post-card :post="$post" />
                @endforeach

            </div>
            <a class="mt-10 block text-center text-lg text-blue-500 font-semibold" href="{{route('blog')}}">More Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold mx-4">Latest Posts</h2>
        <div class="grid md:grid-cols-3 xl:grid-cols-3 sm:grid-cols-1 gap-3 mx-3">

            @foreach ($latestPosts as $post)
                <x-posts.post-card :post="$post" />
            @endforeach

        </div>
        <a class="mt-10 block text-center text-lg text-blue-500 font-semibold" href="{{route('blog')}}">More Posts</a>
    </div>


</x-app-layout>
