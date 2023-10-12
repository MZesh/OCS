<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doners;
use App\Http\Requests\DonerStoreRequest;
class DonerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doners = Doners::all();
        return view('donations.view-doners',compact('doners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('donations.index'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonerStoreRequest $request)
    {
        $doner = Doners::create([
            'doner_name' => $request->name,
            'amount' => $request->amount,
            'doner_co' => $request->dco
        ]);

        return to_route('doners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doners $doner)
    {
        return view('donations.view',compact('doner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doners $doner)
    {
        return view('donations.edit',compact('doner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doners $doner)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'dco' => 'required'
        ]);

        $doner->update([
            'doner_name' => $request->name,
            'amount' => $request->amount,
            'doner_co' => $request->dco
        ]);

        return to_route('doners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doners $doner)
    {
        $doner->delete();
        return to_route('doners.index');
    }
}
