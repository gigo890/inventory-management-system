<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Create New Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="w-fill mx-20 flex justify-center">
              <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="bg-white dark:bg-gray-200 p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                @csrf
                <x-text-input name="name" class="w-full" placeholder="Item name" value="{{ @old('name') }}"></x-text-input>
                @error('name')
                    <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                @enderror
                <x-textarea name="description" placeholder="Type the item description" rows="8" value="{{ @old('description') }}" class="w-full mt-6"></x-textarea>
                @error('description')
                    <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                @enderror
                <x-input-group>
                    <x-input-label for="price">Price:</x-input-label>
                    <x-number-input name="price" min="0" class="before:content-['£']" placeholder="£0" value=""></x-number-input>
                </x-input-group>
                <x-input-group>
                    <x-input-label for="image">Image:</x-input-label>
                    <input type="file" accept="image/*"name="image" class="mt-1" placeholder="Upload Image"></input>
                </x-input-group>
                <x-primary-button class="mt-6">Save item</x-primary-button>
                @if(Session::has('success'))
                    <div>
                        {{ Session::get('success') }}
                    </div>
                @endif
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
