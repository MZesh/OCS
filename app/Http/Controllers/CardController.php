<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CardStoreRequest;
use App\Models\Cards;
use App\Models\Memberships;
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Cards::all();
        return view('cards.view-all-card',compact('cards'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Memberships::all();
        return view('cards.index',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardStoreRequest $request)
    {
        $cards = Cards::create([
            'name' => $request->member,
            'father_name' => $request->fname,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'bgroup' => $request->bgroup,
            'image' => $request->image,
            'regno' => $request->id,
        ]);

        return to_route('card.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cards $card)
    {
        return view('cards.view',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cards $card)
    {
        return view('cards.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cards $card)
    { 
        $request->validate([
            'name' => ['required'],
            'fname' => ['required'],
            'mobile' => ['required'],
            'address' => ['required'],
            'bgroup' => ['required'], 
        ]);
        $card->update([
            'name' => $request->name,
            'father_name' => $request->fname,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'bgroup' => $request->bgroup
        ]);

        return to_route('card.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cards $card)
    {
        $card->delete();
        return to_route('card.index');
    }

    //search by dropdown

    public function selectFromDropdown($id)
    {
        $data = Memberships::where('id',$id)->get();
        return response()->json($data);
    }
}
