<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Item Inventory
        </h2>
    </x-slot>

   <div class="py-12">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image Path</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock Amount</th>
                <th>Reserved Amount</th>
            </tr>
            @forelse($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->image_path}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->stock_amount}}</td>
                    <td>{{$item->reserved_amount}}</td>
                </tr>
            @empty
                <p>There are no items to display</p>
            @endforeach
        </table>
    </div>
</x-app-layout>
