<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items
        </h2>
    </x-slot>

    {{-- SEARCH --}}
    <div class="w-full">
    <form class="max-w-md mx-auto w-6/12 mt-2 bg-white">
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
                <div class="flex flex-col flex-wrap m-5 w-[300px] h-[550px] max-w-sm max-h-md bg-white border border-gray-200 rounded-lg rounded-lg dark:border-gray-700">
                    <a href="#" >
                    <img class="rounded-t-lg object-fit:cover rounded-t-lg " src="{{ asset($item->image_path)  }}" width="100%" height="250" alt="" />
                    </a>
                    <div class="p-5  w=100% h=100%" >
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-800">{{ $item->name }}</h5>
                        </a>
                        <p class="mb-3 border-t-2 dark:border-gray-800 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($item->description, 100, '...') }}</p>
                        <a href="{{ route('items.show', $item) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Show Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
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
