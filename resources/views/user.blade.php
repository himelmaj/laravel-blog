<x-app-layout>
    <section class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:1200px">
        <article class="flex flex-wrap gap-2">
            @if ($user->provider_avatar != null)
                <img src="{{ $user->provider_avatar }}" alt="" class=" w-40 h-40">
            @else
                <img src="{{ $user->profile_photo_url }}" alt="" class=" w-40 h-40">
            @endif
            <div class="f">
                <h1 class="xl:text-7xl lg:text-7xl md:text-4xl sm:text-2xl text-5xl semi-bold text-blue-500">
                    {{ $user->name }}</h1>
                <p class="ml-1 text-sm text-blue-400 mt-2">{{ $user->email . ' ✨' . $user->username }}</p>

                <div class="ml-1 mt-2 flex flex-wrap">
                    @if ($user->linkedin != null)
                        <a href="{{ 'https://www.linkedin.com/in/' . $user->linkedin }}"
                            class=" bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 me-2"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#c0c0c0" d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/></svg>
                                {{ $user->linkedin }}
                            </span>
                            </a>
                    @endif

                    @if ($user->github != null)
                        <a href="{{ 'https://github.com/' . $user->github }}"
                            class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>{{ $user->github }}
                            </span>

                        
                        </a>
                    @endif
                </div>

            </div>
        </article>

        <article class="my-20">
            <h1 class="text-3xl font-bold my-5">Posts</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                @forelse ($posts as $post)
                    <x-posts.post-card :post="$post" :key="$post->slug" />

                @empty
                    <p class="text-gray-500 ">No posts yet</p>
                @endforelse
            </div>
        </article>
    </section>
</x-app-layout>
