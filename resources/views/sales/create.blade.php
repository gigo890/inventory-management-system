<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Create New Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="w-fill mx-20 flex flex-col justify-center">
                <form action="{{ route('sale.store', $order->id) }}" method="post" enctype="multipart/form-data" class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl divide-y-2 divide-gray-200 ">
                    @csrf
                    <h1 class="w-full text-center text-2xl font-bold">ORDER DETAILS</h1>
                    <div class="divide-y-2 divide-gray-200 w-full">

                        @foreach($order->orderedItems as $orderedItem)
                            <div class="flex flex-col items-center bg-white md:flex-row w-full">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $orderedItem->item->product->image_path }}" alt="">
                                <div class="flex justify-between p-4 w-full leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $orderedItem->item->product->name }}</h5>
                                    <p class="mb-3 font-normal text-gray-700">£{{ $orderedItem->item->product->price }}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <h1 class="w-full text-end p-4 font-bold">Total: £{{ $order->total }}</h1>
                        <div class="py-2">
                            <p class="px-4 text-end">Employee #{{ Auth::id() }}</p>
                            <p class="px-4 text-end">Order #{{ $order->id }}</p>

                        </div>
                    <div class="w-full flex justify-center pt-4">
                        <x-primary-button class="m-2">Confirm Details</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
