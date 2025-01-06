<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Your Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="w-fill mx-20 flex flex-col justify-center">
                <form class="w-full" action="{{ route('order.search', $branch) }}">
                    @csrf
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search Items" required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                    @if(isset($results))
                    <div>
                        @foreach ($results as $item)
                        <div>
                            <img src="{{ asset($item->product->image_path) }}" alt="">
                            <h1>{{ $item->product->name }}</h1>
                            <h2>£{{ number_format($item->product->price, 2) }}</h2>
                        </div>
                        @endforeach
                     </div>
                    @endif
              <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data" class="bg-white dark:bg-gray-200 p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl w-full">
                <div>WORK IN PROGRESS</div>
                <div class="border-2 border-gray-300 p-5 w-full">
                    {{-- SEARCH FROM FLOWBITE TAILWIND CSS --}}


                </div>

                @if(Session::has('success'))
                    <div>
                        {{ Session::get('success') }}
                    </div>
                @endif
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
