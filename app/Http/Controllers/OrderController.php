<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Branch;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function create()
    {

    }
    public function search(Request $request, Branch $branch){
        $search = $request->get('search');
        $results = Item::with(['product'=>function($query){
            $query->where('name','like','%$search%');
        }])->orWhere('id' == $search);
        return redirect()->route('order.create')->with(compact('branch', 'results'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Branch $branch)
    {
        $order = new Order(['branch_id'=>$branch->id]);
        $order->save();
        return route('order.show', $order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
