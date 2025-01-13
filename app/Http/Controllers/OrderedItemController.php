<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderedItem;
use Illuminate\Http\Request;

class OrderedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $order_id, int $item_id)
    {
        $item = Item::find($item_id);
        return view('ordereditem.create', compact('order_id', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $order_id, int $item_id)
    {
        $ordered_item = new OrderedItem(['order_id'=>$order_id, 'item_id'=>$item_id]);
        $ordered_item->save();

        $item = Item::find($item_id);
        $order = Order::find($order_id);
        $new_total = $order->total + $item->product->price;

        $order -> update(['total' => $new_total]);
        $order->save();

        return redirect()->route('order.show', Order::find($order_id));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderedItem $orderedItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderedItem $orderedItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderedItem $orderedItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderedItem $orderedItem)
    {
        //
    }
}
