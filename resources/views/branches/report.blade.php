<x-app-layout>
    <x-slot name="header">
        <x-branch-navigation :branches=$branches :branch=$branch></x-branch-navigation>
    </x-slot>

   <div class="py-12 m-4 ">
        <div class="relative overflow-x-auto">
            <div class="md:grid md:grid-cols-2 md:grid-rows-2 md:grid-flow-row text-3xl gap-4">
                <div class="flex flex-col text-center bg-white rounded-xl">
                    <h1 class="bg-gray-800 text-white p-4 rounded-t-xl">
                        TOTAL REVENUE
                    </h1>
                    <h1 class="pt-4 text-center">
                        £{{ $total }}
                    </h1>
                </div>
                <div class="flex flex-col text-center bg-white rounded-xl">
                    <h1 class="bg-gray-800 text-white p-4 rounded-t-xl">
                        TOTAL SALES
                    </h1>
                    <h1 class="pt-4 text-center">
                        {{ $salesAmount }}
                    </h1>
                </div>
                <div class="flex flex-col text-center bg-white rounded-xl">
                    <h1 class="bg-gray-800 text-white p-4 rounded-t-xl">
                        Highest Performing Staff
                    </h1>
                    <table>
                        <thead class="uppercase bg-gray-300 border-gray-800 border-b-2 sm:rounded-t-lg">
                            <tr class=" divide-x divide-gray-500">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SALES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $user)
                            <tr class="border-b border-gray-200 justify-items-center items-center divide-x hover:bg-gray-100">
                                <td>#{{ $user->id }}  </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->sales->count() }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col text-center bg-white rounded-xl">
                    <h1 class="bg-gray-800 text-white p-4 rounded-t-xl">
                        MOST EXPENSIVE SALE
                    </h1>
                    <h1 class="pt-4 text-center">
                        £{{ $highestSale }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
