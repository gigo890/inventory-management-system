<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Products List
        </h2>
    </x-slot>

   <div class="py-12 m-4 flex flex-col">
        <a type="button" href="{{ route('products.create') }}" class=" m-4 mb-4 w-fit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Add New Product
        </a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left rtl:text-right  ">
                <thead class="text-xs uppercase bg-gray-300 border-gray-800 border-b-2 sm:rounded-t-lg">
                    <tr class='divide-x divide-gray-500'>
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
                    <tr class="border-b border-gray-200 divide-x">

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
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center items-center">
                            <a type="button" href="{{ route('products.edit',$product) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                                Remove
                            </button>
                        </td>
                    </tr>
                    @empty
                    <p>No items to display.</p>
                    @endforelse
                </tbody>
            </table>
            <div class='justify-between justify-items-center m-4'>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
