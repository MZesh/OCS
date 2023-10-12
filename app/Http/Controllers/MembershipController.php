<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memberships;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MembershipStoreRequest;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Memberships::all();
        return view('membership.registered-member',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('membership.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipStoreRequest $request)
    {
        $file = $request->file('file')->store('public/pic');
        $membership = Memberships::create([
            'name' => $request->name,
            'father_name' =>$request->fname,
            'nic' => $request->nic,
            'contact_pak' => $request->contact,
            'address_pak' => $request->address,
            'iqama' => $request->iqama,
            'work_address' => $request->waddress,
            'contact_saudi' => $request->scontact,
            'contact_relative' => $request->rcontact,
            'pic' => $file

        ]);

        return to_route('membership.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Memberships $membership)
    {
        return view('membership.view',compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memberships $membership)
    {
       // $membership = Memberships::where('id' , $id); dd($membership);
        return view('membership.edit',compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memberships $membership)
    {
        $pic = $membership->pic;
        if($request->hasFile($pic)){
            Storage::delete($pic);
            $image = $request->file('file')->store('public/pic');
        }

        $membership->update([
            'name' => $request->name,
            'father_name' =>$request->fname,
            'nic' => $request->nic,
            'contact_pak' => $request->contact,
            'address_pak' => $request->address,
            'iqama' => $request->iqama,
            'work_address' => $request->waddress,
            'contact_saudi' => $request->scontact,
            'contact_relative' => $request->rcontact,
            'pic' => $pic
        ]);

        return to_route('membership.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memberships $membership)
    {
        Storage::delete($membership->pic);
        $membership->delete();
        return to_route('membership.index')->with('danger','Membership deleted Successfully..');
    }
}
