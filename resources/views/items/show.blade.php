<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Item Details
        </h2>
    </x-slot>

    {{-- CONTENT --}}
   <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-fit sm:px-6 lg:px-8 space-y-6">
        <x-back-button></x-back-button>

            {{-- <div class="flex justify-center flex-row flex-wrap items-stretch m-5 p-5 min-w-96 h-auto bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-lg">

                {{-- ITEM IMAGE --}}
                {{-- <div class="flex justify-center min-w-300px w-6/12 m-2 rounded-lg border-2  dark:border-gray-700">
                    <img src="{{ asset($item->product->image_path)  }}" alt="Item Image" class="rounded-lg">
                </div> --}}

                {{-- ITEM DETAILS --}}
                {{-- <div class="grow m-5 flex flex-col justify-start min-w-300px w-80">
                    <div class="w-fill m-5 flex justify-center"><a href="#" class="w-6/12 text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reserve</a></div>

                    <h1 class="mb-2 m-x-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white border-b-2 border-gray-800 dark:border-white ">{{ ($item->product->name) }}</h1>
                    <h5 class="mt-2 border-b-2 border-gray-700 dark:border-white font-bold">Description:</h5>
                    <p class="mt-2">{{ ($item->product->description) }}</p>

                </div> --}}
                {{-- ITEM DESCRIPTION --}}

            {{-- </div>  --}}
            <section class="py-8 bg-white md:py-16">
                <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                  <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                    <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                      <img class="w-full" src="{{ asset($item->product->image_path) }}" alt="Item image" />
                    </div>

                    <div class="mt-6 sm:mt-8 lg:mt-0">
                      <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                        {{$item->product->name}}
                      </h1>
                      <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                          £{{ $item->product->price }}
                        </p>
                      </div>

                      <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <h2>In Stock: <h1>{{ $item->stock }}</h1></h2>

                      </div>

                      <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                      <p class="mb-6 text-gray-500">{{ $item->product->description }}</p>
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
</x-app-layout>
