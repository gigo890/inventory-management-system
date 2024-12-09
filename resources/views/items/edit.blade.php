<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
              <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <x-text-input name="name" class="w-full" placeholder="Item name" value="{{ @old('name') }}"></x-text-input>
                @error('name')
                    <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                @enderror
                <x-textarea name="description" placeholder="Type the item description" rows="8" value="{{ @old('description') }}" class="w-full mt-6"></x-textarea>
                @error('description')
                    <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                @enderror
                <x-text-input name="dimensions" class="w-full" placeholder="Item dimensions" value="not provided"></x-text-input>
                <x-number-input name="stock" class="w-full" value="{{ @old('stock_amount') }}"><x=number-input>
                <input type="file" accept="image/*"name="image" class="mt-6" placeholder="Upload Image"></input>
                <x-primary-button class="mt-6">Save item</x-primary-button>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
