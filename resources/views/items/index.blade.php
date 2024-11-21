<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items
        </h2>
    </x-slot>

     {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse ($items as $item)
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
              <h2 class="font-bold text-2xl text-indigo-600">
                <a href="{{ route('items.show', $item) }}" class="hover:underline">{{ $item->name }}</a>
                </h2>
              <p class="mt-2">{{ Str::limit($item->description, 50, '...') }}</p>
              <span class="block mt-4 text-sm opacity-70">{{ $item->updated_at->diffForHumans() }}</span>
            </div>
            @empty
            <p>There are no items to display.</p>
            @endforelse
            {{ $items->links() }}
        </div>
    </div> --}}




    @forelse ($items as $item)<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ asset($item->image_path)  }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($item->description, 50, '...') }}</p>
        <a href="{{ route('items.show', $item) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Show Details
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    @empty
        <p>There are no items to display.</p>
    @endforelse
    {{ $items->links() }}
</div>



</x-app-layout>
