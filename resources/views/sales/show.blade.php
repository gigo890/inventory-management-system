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
                      <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                        Sale #{{$sale->id}}
                      </h1>
                      <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                          Order #{{ $sale->order_id }}  |  Staff #{{ $sale->user_id }}  |  Branch: {{ $sale->user->branch->name }}
                        </p>
                      </div>

                      <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                      {{-- <p class="mb-6 text-gray-500">{{  }}</p> --}}
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
</x-app-layout>
