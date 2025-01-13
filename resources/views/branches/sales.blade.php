<x-app-layout>
    <x-slot name="header">
        <x-branch-navigation :branches=$branches :branch=$branch></x-branch-navigation>
    </x-slot>

   <div class="py-12 m-4 ">
        <h1>SALES</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left rtl:text-right  ">
                <thead class="text-xs uppercase bg-gray-300 border-gray-800 border-b-2 sm:rounded-t-lg">
                    <tr class='divide-x divide-gray-500'>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Staff
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Payment Date
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Amount of Items
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <tr class="border-b border-gray-200 justify-items-center items-center divide-x hover:bg-gray-100">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            {{($sale->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($sale->order_id) }}
                        </th>
                        <td class="px-6 py-4">
                            {{($sale->user_id) }}
                        </td>
                        <td class="px-6 py-4 line-clamp-1">
                            £{{ ($sale->amount_paid) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sale->created_at }}
                        </td>
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center">
                            <a type="button" href="/branches/{{ $branch->id }}/sales/{{ $sale->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                View Invoice
                            </a>
                            <a type="button" href="{{ route('items.edit',$sale) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
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
