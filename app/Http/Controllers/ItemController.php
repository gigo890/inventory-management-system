<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditItemRequest;
use App\Models\Branch;
use App\Models\Item;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $items = Item::Paginate(6);
        }else{
        $items = Item::where('branch_id' == $user->branch_id)->Paginate(6);
        }
        return view("items.index",['items'=>$items, 'branch'=>$user->branch]);
    }

    public function search(Request $request, Branch $branch){
    }
    // public function inventory()
    // {
    //     $user_id = Auth::id();
    //     $items = Item::Paginate(10);
    //     return view('items.inventory')->with('items', $items);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        // $path = 'images/' . time() .'.'. $request->image->getClientOriginalExtension();
        // Storage::disk('local')->put($path, $request->file('image'));

        $path = 'images/'.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $path);

        $item = new Item([
            'name'=> $request->name,
            'description'=> $request->description,
            'dimensions'=> $request->dimensions,
            'stock_amount' => $request->stock,
            'image_path' => $path,
        ]);
        $item->save();
        return back()->with('success', 'Item Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $item->update([
            'stock' => $request->stock
        ]);

        if(Auth::user()->role == 'Admin'){
            return redirect(route('branch.show', $item->branch));
        }else{
            return redirect(route('items.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
