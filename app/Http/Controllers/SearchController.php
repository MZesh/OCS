<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;

class SearchController extends Controller
{
    
    public function search()
    {
        $search_text = $_GET['search'];
        $payments = Payments::where('name','LIKE','%'.$search_text.'%')->orWhere('regno' ,'=',$search_text)->get();
        return view('payments.payment-search',compact('payments','search_text'));
    }
}
