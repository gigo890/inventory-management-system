<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                <h1>EDITING ITEM ID {{ $item->id }}: {{ $item->product->name }}</h1>
                <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data" id="edit-form" class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                    @method('put')
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <x-input-label for="stock">Stock</x-input-label>
                            <x-number-input name="stock" id="stock" value="{{ $item->stock }}"></x-number-input>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
