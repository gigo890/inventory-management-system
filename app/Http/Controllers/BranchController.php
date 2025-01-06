<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index')->with('branches', $branches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function report(int $branch_id){
        $branch = Branch::find($branch_id);
        if(Auth::user()->role == 'Admin'){
            $branches = Branch::all();
            return view('branches.report', compact('branches', 'branch'));
        }else{

        }
    }
    public function sales(int $branch_id){
        $branch = Branch::find($branch_id);
        if(Auth::user()->role == 'Admin'){
            $branches = Branch::all();

            $sales = Sale::with(['user'])
                        ->whereHas('user', function($q) use($branch_id){
                            $q->where('branch_id', '=', $branch_id);
                    })->get();

            return view('branches.sales', compact('branches', 'branch', 'sales'));
        }else{

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $branch_id)
    {
        $branch = Branch::find($branch_id);
        if(Auth::user()->role == 'Admin'){
            $branches = Branch::all();
            return view('branches.show', compact('branches', 'branch'));
        }
        else{
            return view('items.index')->with('branch', $branch);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
