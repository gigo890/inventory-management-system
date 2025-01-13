<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Branches
        </h2>
    </x-slot>

   <div class="py-12 m-4 flex flex-col">
        <a type="button" href="{{ route('items.create') }}" class=" m-4 mb-4 w-fit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none">
            + Add New branch
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
                            Item Count
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Low Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($branches as $branch)
                    <tr id="row-{{ $branch->id }}" class="border-b border-gray-200 justify-items-center items-center divide-x hover:bg-gray-200">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{($branch->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($branch->name) }}
                        </th>
                        <td scope="row" class="px-6 py-4">
                            {{ $branch->items->count() }}
                        </td>
                        <td scope="row" class="px-6 py-4">
                            {{ $branch->items->where('stock', '<', 10)->count() }}
                        </td>
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center">
                            <a type="button" href="{{ route('branch.report', $branch->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                View
                            </a>

                            <a type="button" href="{{ route('items.edit',$branch) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
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

