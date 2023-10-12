<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;
use App\Http\Requests\EmergencyStoreRequest;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Emergency::all();
        return view('emergency.all-fund',compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emergency.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmergencyStoreRequest $request)
    {
        $fund = Emergency::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'address' => $request->address,
            'fund_for' => $request->ffor,
        ]);

        return to_route('emergency.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emergency $emergency)
    {
        return view('emergency.view',compact('emergency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emergency $emergency)
    {
        return view('emergency.edit',compact('emergency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emergency $emergency)
    {
        $request->validate([
            'name' => ['required'],
            'amount' => ['required'],
            'address' => ['required'],
            'ffor' => ['required'],
        ]);

        $emergency->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'address' => $request->address,
            'fund_for' => $request->ffor,
        ]);

        return to_route('emergency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emergency $emergency)
    {
        $emergency->delete();
        return to_route('emergency.index');
    }
}
