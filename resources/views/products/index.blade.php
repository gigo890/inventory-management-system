{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Products
        </h2>
    </x-slot>

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

   <div class="py-12">
            <div class='justify-between justify-items-center m-4'>
            {{ $products->links() }}
            </div>
        <div class="flex flex-row flex-wrap justify-center content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @forelse ($products as $product)
                    <x-index-product :product=$product>
                        {{ $product }}
                    </x-index-product>
                @empty
                <p>There are no products to display.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Item Inventory
        </h2>
    </x-slot>

   <div class="py-12 m-4 ">
        <a type="button" href="{{ route('products.create') }}" class=" m-4 mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Add New Product
        </a>

        <div class='justify-between justify-items-center m-4'>
            {{ $products->links() }}
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left rtl:text-right  ">
                <thead class="text-xs dark:text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image Path
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="h-20 border-b border-gray-200 justify-items-center items-center">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            {{($product->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($product->name) }}
                        </th>
                        <td class="px-6 py-4">
                            {{($product->image_path) }}
                        </td>
                        <td class="px-6 py-4 line-clamp-1">
                            {{ ($product->description) }}
                        </td>
                        <td class="px-6 py-4">
                            £{{ number_format($product->price, 2) }}
                        </td>
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center">
                            <a type="button" href="{{ route('products.edit',$product) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                                Remove
                            </button>
                        </td>
                    </tr>
                    @empty
                    <p>No items to display.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
