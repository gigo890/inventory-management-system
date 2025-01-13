<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use FontLib\TrueType\Collection;
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

            $total = 0;//total revenue
            $salesAmount = 0; //amount of sales

            foreach($branch->users as $user){
                foreach($user->sales as $sale){
                    $total = $total + $sale->amount_paid;
                    $salesAmount++;
                }
            }

            //highest staff sales
            $staff = User::where('branch_id' ,"=", $branch_id)
                        ->withCount('sales')
                        ->orderBy('sales_count', 'desc')->limit(3)->get();

            //highest sale
            $highestSale = Sale::select('amount_paid')->max('amount_paid');
            return view('branches.report', compact('branches', 'branch', 'total', 'staff', 'highestSale', 'salesAmount'));
        }else{

        }
    }
    public function sales(int $branch_id){
        $branch = Branch::find($branch_id);
        if(Auth::user()->role == 'Admin'){
            $branches = Branch::all();

            $sales = Sale::whereRelation('user', 'branch_id', '=', $branch->id)->get();

            return view('branches.sales', compact('branches', 'branch', 'sales'));
        }
        else
        {
            return route('sales.index', $branch);
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
