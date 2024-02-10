<header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-semibold">
            <span class="text-blue-500 text-xl">dev.dive</span>
        </div>

        <div class="top-menu ml-10">

            <ul class="flex space-x-4">
                <li>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500" href="">
                        Home
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500" href="">
                        Blog
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500" href="">
                        About Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500" href="">
                        Contact Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500"
                        href="terms-of-service">
                        Terms
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <div id="header-right" class="flex items-center md:space-x-6">
        @guest
            @include('layouts.partials.header-right-guest')
        @endguest

        <!-- Settings Dropdown -->

        @auth
            @include('layouts.partials.header-right-auth')
        @endauth
    </div>
</header>
