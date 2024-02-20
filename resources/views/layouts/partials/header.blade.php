<header class="flex items-center justify-between py-3 px-6 border-b h-14 border-gray-100 bg-white shadow-sm">
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-semibold">
            <x-application-mark class="block h-9 w-auto" />
        </div>

        <div class="top-menu ml-10">

            <ul class="flex space-x-4">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>
            </ul>
        </div>
    </div>


    <div id="header-right" class="flex items-center md:space-x-6">
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</header>
