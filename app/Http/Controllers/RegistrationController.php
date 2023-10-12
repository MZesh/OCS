<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationFee;
use App\Models\Memberships;
use App\Http\Requests\RegistrationStoreRequest;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = RegistrationFee::all();
        return view('fee.view-all',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Memberships::get();
        return view('fee.index',compact('members'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(RegistrationStoreRequest $request)
    {
        $fee = RegistrationFee::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'regno' => $request->id,
        ]);

        return to_route('fee.index')->with('success',['inserted',$request->id,$request->name,$request->amount,date('Y/m/d')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrationFee $fee)
    {
        return view('fee.view',compact('fee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrationFee $fee)
    {
        return view('fee.edit',compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistrationFee $fee)
    {
        $request->validate([
            'name' => ['required'],
            'amount' => ['required'],
        ]);

        $fee->update([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);

        return to_route('fee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationFee $fee)
    {
        $fee->delete();
        return to_route('fee.index');
    }
}
