<?php

namespace App\Http\Controllers;
use App\Http\Requests\ExpenseStoreRequest;
use Illuminate\Http\Request;
use App\Models\Expenses;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expenses::all();
        return view('expenses.view-all-expense',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseStoreRequest $request)
    {
        $expense = Expenses::create([
            'expense_detail' => $request->expense,
            'total_budget' => $request->budget,
            'total_expense' => $request->texp

        ]);

        return to_route('expense.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expenses $expense)
    {
        return view('expenses.view',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expenses $expense)
    {
        return view('expenses.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenses $expense)
    {
        $request->validate([
            'expense' => ['required'],
            'budget' => ['required'],
            'texp' => ['required'],
        ]);

        $expense->update([
            'expense_detail' => $request->expense,
            'total_budget' =>   $request->budget,
            'total_expense' =>  $request->texp
        ]);

        return to_route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenses $expense)
    {
        $expense->delete();
        return to_route('expense.index');
    }
}
