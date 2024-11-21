<?php

namespace App\Http\Controllers;

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
        $user_id = Auth::id();
        $items = Item::paginate(5);
        return view("items.index")->with('items', $items);
    }

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


        $path = time() .'.'. $request->image->getClientOriginalExtension();
        Storage::put($path, $request->file('image'));

        $item = new Item([
            'name'=> $request->name,
            'description'=> $request->description,
            'dimensions'=> $request->dimensions,
            'image_path' => asset($path),
        ]);
        $item->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
