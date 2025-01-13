<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="w-fill mx-20 flex justify-center">
              <form action="/ordereditem/store/{{ $order_id }}/{{ $item->id }}" method="post" enctype="multipart/form-data" class="flex flex-col align-center bg-white dark:bg-gray-200 p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                @csrf
                <h1>Add {{ $item->product->name }} to the order?</h1>
                <x-primary-button class="mt-6">Confirm</x-primary-button>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
