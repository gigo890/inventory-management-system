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

                <div id="item-search-display" class="mt-6" >

                </div>
                <div class="md:w-full">
                    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data" class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl md:min-w-[250px] w-full md:w-2/5 max-h-2xl h-fit justify-self-end ">
                    <div>CHECKOUT</div>
                    <div class="border-y-2 border-gray-300 p-5">

                        items
                        go
                        here
                    </div>
                    <div class="">
                        <h5>TOTAL: £bazillion</h5>
                    </div>
                    @if(Session::has('success'))
                        <div>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </form>
            </div>
                </div>

        </div>
    </div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){

                $value=$(this).val();

                $.ajax({
                    type:'get',
                    url :"{{ route('items.search') }}",
                    data:{'search':$value},
                    success:function(data){
                        $('#item-search-display').html(data);
                    }
                 });
            })
            function GetItemDisplay(data){

            }
        </script>
        <script type="text/javascript">
            $.ajaxSetup({ headers:{'csrftoken' : '{{ csrf_token() }}'} });
        </script>
</x-app-layout>
