<x-app-layout>
    <section class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:800px">
        <article class="flex flex-wrap gap-2">
            <img src="{{ $user->profile_photo_url }}" alt="" class=" w-40 h-40">
            <div class="">
                <h1 class="text-7xl semi-bold">{{ $user->name }}</h1>
                <p class="ml-1 text-sm text-gray-500">{{ $user->email }}</p>
            </div>
        </article>
    </section>

    <section class="">
        
    </section>
</x-app-layout>
