<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Items
        </h2>
    </x-slot>

    {{-- SEARCH --}}
    <div class="w-full">
    <form class="max-w-md mx-auto w-6/12 mt-2">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    </div>

    {{-- CONTENT --}}
   <div class="py-12">
        <div class="flex flex-row flex-wrap justify-center content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @forelse ($items as $item)
                    <x-index-item :item=$item>
                        {{ $item }}
                    </x-index-item>
                @empty
                <p>There are no items to display.</p>
                @endforelse
            </div>
            <div class='justify-between justify-items-center m-4'>
            {{ $items->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
