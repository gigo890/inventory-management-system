<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="flex flex-row flex-wrap justify-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


                @forelse ($items as $item)
                <div class="flex flex-col flex-wrap m-5 w-[300px] max-w-sm bg-white border border-gray-200 rounded-lg  dark:border-gray-700">
                    <a href="#" >
                    <img class="rounded-t-lg object-fit:cover rounded-t-lg " src="{{ ($item->image_path)  }}" width="100%" height="250" alt="" />
                    </a>
                    <div class="p-5 shadow dark:border-gray-800 rounded-lg w=100% h=100%" >
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
                {{ $items->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
