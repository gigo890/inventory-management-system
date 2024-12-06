<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Item Inventory
        </h2>
    </x-slot>

   <div class="py-12 m-4 ">
        <a type="button" href="{{ route('items.create') }}" class=" m-4 mb-4 text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Add New Item
        </a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:border-gray-800 border">
            <table class="w-full text-sm text-left rtl:text-right dark:text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs dark:text-gray-700 uppercase dark:text-gray-400 dark:bg-gray-200">
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
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Reserved
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="h-20 border-b border-gray-200 border-gray-700 justify-items-center items-center dark:text-white">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 ">
                            {{($item->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($item->name) }}
                        </th>
                        <td class="px-6 py-4">
                            {{($item->image_path) }}
                        </td>
                        <td class="px-6 py-4 line-clamp-1">
                            {{ ($item->description) }}
                        </td>
                        <td class="px-6 py-4">
                            £{{ number_format($item->price, 2) }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 text-white">
                            {{ $item->stock_amount }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 border-l-gray-400 border-l-2 dark:bg-gray-800 text-white">
                            {{ ($item->reserved_amount) }}
                        </td>
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center divide-x dark:divide-white divide-gray-700">
                                <a href="" class="px-2 text-blue-500 dark:text-white hover:text-purple-500 dark:hover:text-gray-100 hover:underline">
                                Edit
                                </a>
                                <a href="" class="px-2 text-blue-500 dark:text-white hover:text-purple-500 dark:hover:text-gray-100 hover:underline">
                                    Remove
                                </a>
                        </td>
                    </tr>
                    @empty
                    <p>No items to display.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="m-4">
            {{ $items->links() }}
        </div>

    </div>
</x-app-layout>
