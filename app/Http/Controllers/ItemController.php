<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditItemRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

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

    public function search(Request $request)
    {
        $output="";
        $order=Order::find($request->order);
        $items = new Collection([]);
        if($request->search != ""){
            $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
            foreach($products as $product){
                $items = $items->merge($product->items);
            }
        }else{
            return '<h3 class="text-center mt-5">Please search for an Item</h3>';
        }

        if($items)
        {
            foreach($items as $item)
            {
                $output .=
                    '<div class="flex flex-col items-center bg-white border border-gray-200 shadow md:flex-row md:max-w-xl ">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="'.asset($item->product->image_path).'" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">'.$item->product->name.'</h5>
                            <p class="mb-3 font-normal text-gray-700">£'.$item->product->price.'</p>
                            <a href="/order/add/'.$request->order.'/'.$item->id.'" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Add
                            </a>
                        </div>
                    </div>';
            }
            return response($output);

        }else{
            return "No Items Found";
        }
    }
    // public function search(Request $request, Branch $branch){
    // }
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
