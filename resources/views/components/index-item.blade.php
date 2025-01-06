@props(['item'])

<div class="flex flex-col flex-wrap m-5 w-[350px] h-[650px] max-w-sm max-h-md bg-white border border-gray-600 rounded-lg rounded-lg text-gray-800">
    <a href="#" class="m-5">
    <img class="rounded-lg object-fit:cover " src="{{ asset($item->product->image_path)  }}" width="100%" height="250" alt="" />
    </a>
    <div class="p-5  w=100% h=100%" >
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ $item->product->name }}</h5>
        </a>
        <p class="py-3 border-t-2 border-gray-800 font-normal ">{{ Str::limit($item->product->description, 100, '...') }}</p>
        <p>Price: £{{ $item->product->price }}</p>
        <p>In Stock: {{ $item->stock }}</p>
        <a href="{{ route('items.show', $item) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Show Details
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
