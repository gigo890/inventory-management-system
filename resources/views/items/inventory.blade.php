<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Item Inventory
        </h2>
    </x-slot>

   <div class="py-12">
        <button type="button" href="{{ route('items.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Add New Item
        </button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right dark:text-gray-500 dark:text-gray-400">
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
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="max-h-[]] border-b border-gray-200 dark:border-gray-700 ">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 ">
                            {{($item->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($item->name) }}
                        </th>
                        <td class="px-6 py-4">
                            {{($item->image_path) }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis">
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
                        <td>
                            <button type="button" href="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Edit
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
