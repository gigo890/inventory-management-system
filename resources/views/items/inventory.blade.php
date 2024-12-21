<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Item Inventory
        </h2>
    </x-slot>

   <div class="py-12 m-4 ">
        <a type="button" href="{{ route('items.create') }}" class=" m-4 mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            + Add New Item
        </a>

        <div class='justify-between justify-items-center m-4'>
            {{ $items->links() }}
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:border-gray-800 border">
            <table class="w-full text-sm text-left rtl:text-right dark:text-white ">
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
                    <tr class="h-20 border-b border-gray-200 dark:border-gray-700 dark: justify-items-center items-center">

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
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center">

                            {{-- MODALS MODIFIED FROM FLOWBITE MODAL--}}
                            <!-- Modal toggle -->
                            <button  data-modal-target="edit-item-modal" data-modal-toggle="edit-item-modal" value={{ $item }} class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" type="button">
                                Edit
                            </button>

                            <div id="edit-item-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <x-modals.edit-item :item=$item>{{ $item }}</x-modals.edit-item>
                            </div>

                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                            Remove
                            </button>

                            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                            <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <p>No items to display.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('backend/flowbite/dist/flowbite.js') }}">

        let EditModal = new Modal(document.getElementById('edit-item-modal'))

        document.getElementById('open-edit-modal').addEventListener("click", EditModal());

        function EditModal(){
            document.getElementById('edit-item-modal').classList.remove('hidden')
        }
    </script>
</x-app-layout>
