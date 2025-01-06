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
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="border-b border-gray-200 justify-items-center items-center divide-x">

                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            {{($item->id) }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ ($item->product->name) }}
                        </th>
                        <td class="px-6 py-4">
                            {{($item->product->image_path) }}
                        </td>
                        <td class="px-6 py-4 line-clamp-1">
                            {{ ($item->product->description) }}
                        </td>
                        <td class="px-6 py-4">
                            £{{ number_format($item->product->price, 2) }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 text-white">
                            {{ $item->stock }}
                        </td>
                        <td class="h-full px-6 py-4 flex justify-center justify-items-center align-center">
                            <a type="button" href="{{ route('items.edit',$item) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
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
        <div id="edit-item-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <x-modals.edit-item id="edit-modal-input"></x-modals.edit-item>
        </div>
    </div>
    <script src="{{ asset('backend/flowbite/dist/flowbite.js') }}">

        let EditModal = new Modal(document.getElementById('edit-item-modal'));
        let ModalInput = document.getElementById('edit-modal-input');
        let item = $item;

        let btns = document.querySelectorAll('button');
        for (i of btns){
            i.addEventListener('click',EditModal());
        }

        function EditModal(){
            document.getElementById('edit-item-modal').classList.remove('hidden');
            item = this.value;
            document.getElementById('edit-modal-input').innerHTML = $item;
        }
    </script>
</x-app-layout>
