@extends('layouts.master')
@section('title') {{'Donation'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Doner Information <a href="{{route('doners.index')}}" class="btn btn-primary float-right mb-1">View All Doners</a></h4> 
                         
                    </div>
                    <table class="table mb-3">
                        <thead>
                            <tr><td></td> <td><span class="float-right">DATE: {{$doner->created_at}}</span></td></tr>
                            <tr> <td scope="col"><strong >S NO</strong></td><td>{{$doner->id}}</td></tr>
                            <tr> <td scope="col"><strong>Doner Name</strong></td><td>{{$doner->doner_name}}</td></tr>
                            <tr><td scope="col"><strong>Donation Amount</strong></td><td>{{$doner->amount}}</td>  </tr>
                            <tr><td scope="col"><strong>Doner C/O</strong></td><td>{{$doner->doner_co}}</td> </tr>

                        </thead>
                       
                    </table> 
                 
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
