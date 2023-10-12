@extends('layouts.master')
@section('title') {{'Card Overview'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5"> 
                <div class="card-body ">
                    <div class="card-header card-bg" id="card-print">
                        <div class="text-center head">
                            <img src="{{asset('logo1.jpg')}}" class="text-success text-center rounded-circle mt-1" width='50px' height="50px"/>
                            <h5 class="text-success text-center p-1">OCS MEMBERSHIP CARD</h5> 
                        </div>
                        <table class="table mb-3">
                            <thead>
                                <tr><td><h6 class="card-title " colspan='2'>Registration No: OCS-{{$card->regno}}</h6></td> </tr>
                                <tr><td><h6 class="card-title">Name: {{$card->name}}</h6></td> <td> <h6 class="card-title">Father Name: {{$card->father_name}}</h6></td></tr>
                                <tr> <td scope="col"><a href="#" class="card-link">Mobile: {{$card->mobile}}</a></td><td><a href="#" class="card-link">Blood Group: {{$card->bgroup}}</a> </td></tr>
                                <tr> <td scope="col" colspan="2"><p class="card-text text-center">Address: {{$card->address}}</p></td></tr> 
                                <img src="{{Storage::url($card->image)}}" alt="{{$card->name}}" class="img-card" width='100px' height="100px"/>
                            </thead> 
                        </table>
                        <div class="card-foot text-center">
                            <small>This card is issued under supervision of OCS (Overseas Chitralis in KSA) Team &copy;OCS All right reserved</small>
                        </div>  
                    </div>
                    <button class="btn btn-info mt-2" id="btn-card">Print Card</button>
                    <a href="{{route('card.index')}}" class="btn btn-primary float-right mb-1 mt-2">View Cards</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
