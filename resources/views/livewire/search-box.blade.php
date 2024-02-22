<form>
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <span class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <x-search-icon />
        </span>
        <input type="search"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-200 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search Posts" required wire:model="search">
            @if (strlen($search) > 0)
                <button type="button" class="absolute inset-y-0 end-0 flex items-center pr-3 focus:outline-none" wire:click="clearSearch">
                    <x-delete-icon />
                </button>
                
            @endif
    </div>
    <button class="mt-4 inline-flex items-center px-4 py-2 bg-blue-300 border-2 rounded-md font-semibold
     text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 border-blue-500
    active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
    transition ease-in-out duration-150" wire:click.prevent="updateSearch">Search</button>
</form>
