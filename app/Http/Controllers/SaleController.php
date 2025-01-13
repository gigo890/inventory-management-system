<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
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
    public function create(int $order_id)
    {
        return view("sales.create")->with('order',Order::find($order_id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $order_id)
    {
        $order = Order::find($order_id);

        $sale = new Sale([
            'order_id' => $order_id,
            'user_id' => Auth::id(),
            'amount_paid' => $order->total
        ]);
        $sale->save();

        foreach($sale->order->orderedItems as $orderedItem){
            $orderedItem->item->decrement('stock');
        }

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $branch_id, int $sale_id)
    {
        $sale = Sale::find($sale_id);
        return view('sales.show')->with('sale',$sale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
