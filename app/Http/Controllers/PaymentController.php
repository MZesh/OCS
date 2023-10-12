<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Payments;
use App\Models\Memberships;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //echo now()->format('M');
        $members = Memberships::orderBy('id', 'DESC')->get();
        return view('payments.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.view-all');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required'],
            'months' => ['required'],
            'amount' => ['required'],
            'id' => ['required'],
        ]);
      
        $payments = Payments::create([
            'name' => $request->name,
            'months' => $request->months,
            'amount' => $request->amount,
            'regno' => $request->id,
        ]);

       
        return to_route('payment.index')->with('success',['inserted',$request->id,$request->name,$request->months,$request->amount,date('Y/m/d')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payment)
    {
        return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payment)
    {
        $request->validate([

            'name' => ['required'],
            'months' => ['required'],
            'amount' => ['required']
        ]);

        $payment->update([
            'name' => $request->name,
            'months' => $request->months,
            'amount' => $request->amount
        ]);

        return to_route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payment)
    {
        $payment->delete();
        return to_route('payment.create');
    }

     
}
