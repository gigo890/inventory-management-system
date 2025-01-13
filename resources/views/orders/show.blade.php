<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Your Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <input type="text" class="w-2/5 rounded-sm" id="search" name="search" placeholder="Search item"></input>

            <div class="w-fill mx-20 md:grid md:grid-cols-2">
                <div class="py-2 m-2 rounded-sm bg-white">
                    <h1 class="mx-5 text-center border-b-2 border-gray-300">ITEMS</h1>
                    <div id="item-search-display" class="rounded-lg">
                        <h3 class="text-center mt-5">Please search for an Item</h3>
                    </div>
                </div>

                <div class="md:w-full">
                    <form action="{{ route('sale.create', $order->id) }}" method="get" enctype="multipart/form-data" class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl md:min-w-[250px] w-full md:w-2/5 max-h-2xl h-fit justify-self-end justify-center">
                        <div>CHECKOUT</div>
                        <div  class="border-y-2 border-gray-300 py-5">
                            <ul id="items-in-order" class="divide-y-1 divide-gray-100">
                                @if($order->orderedItems)
                                    @foreach ($order->orderedItems as $orderedItem)
                                        <li class="flex justify-between">
                                            <h3>{{ $orderedItem->item->product->name }}</h3>
                                            <h4>£{{ $orderedItem->item->product->price }}</h4>
                                        </li>
                                    @endforeach
                                @else

                                @endif
                            </ul>
                        </div>
                        <div class="flex justify-between">
                            <h5>TOTAL:</h5>
                            <h5>£{{ $order->total }}</h5>
                        </div>
                        @if(Session::has('success'))
                            <div>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="w-full flex justify-center">
                            <x-primary-button class="">Continue</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){

                $value=$(this).val();
                $order_id = {{ $order->id }};

                $.ajax({
                    type:'get',
                    url :`{{ route('items.search') }}`,
                    data:$.param({search:$value , order:$order_id}),
                    success:function(data){
                        $('#item-search-display').html(data);
                    }
                 });
            })
        </script>
        <script type="text/javascript">
            $.ajaxSetup({ headers:{'csrftoken' : '{{ csrf_token() }}'} });
        </script>
</x-app-layout>
