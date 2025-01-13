<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Sale Details
        </h2>
    </x-slot>

    {{-- CONTENT --}}
   <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-fit sm:px-6 lg:px-8 space-y-6">

        <x-back-button></x-back-button>

            <section class="py-8 bg-white md:py-16">
                <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                  <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                    <div class="mt-6 sm:mt-8 lg:mt-0">
                        <div class="border-b-2 border-black">
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                                Sale #{{$sale->id}}
                            </h1>
                            <p>
                                {{ $sale->created_at }}
                            </p>
                        </div>

                      <div class="sm:items-center sm:gap-4 ">
                        <ul class="w-full text-2xl font-extrabold text-gray-900 sm:text-2xl py-4 flex divide-x-2 divide-black border-b-2 border-black">
                            <li class="px-2"><p>Order #{{ $sale->order_id }}</p></li>
                            <li class="px-2"><p>Staff #{{ $sale->user_id }}</p></li>
                            <li class="px-2"><p>Branch #{{ $sale->user->branch->id }}: {{ $sale->user->branch->name }}</p></li>
                        </ul>
                        <div class="flex justify-end">
                            <ul class="mt-5 divide-y-1 divide-gray-100">
                                    <li class="mx-4 font-bold border-b-2 border-gray-400">ITEMS:</li>
                                @foreach ($sale->order->orderedItems as $orderedItem)
                                    <li class="flex gap-x-5 px-4">
                                        <h3 class="">{{ $orderedItem->item->product->name }}  - </h3>
                                        <h4>£{{ $orderedItem->item->product->price }}</h4>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                      </div>

                      <hr class="my-6 md:my-8 border-black border-t-2" />
                        <h2 class="text-end px-4">Total: £{{ $sale->amount_paid }}</h2>
                      {{-- <p class="mb-6 text-gray-500">{{  }}</p> --}}
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
</x-app-layout>
