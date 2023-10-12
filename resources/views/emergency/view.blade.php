@extends('layouts.master')
@section('title') {{'Funds'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS FUNDS INFORMATION <a href="{{route('emergency.index')}}" class="btn btn-primary float-right mb-1">View Funds</a></h4> 
                         
                    </div>
                    <table class="table mb-3">
                        <thead>
                            <tr><td></td> <td><span class="float-right">DATE: {{$emergency->created_at}}</span></td></tr>
                            <tr> <td scope="col"><strong >S NO</strong></td><td>{{$emergency->id}}</td></tr>
                            <tr> <td scope="col"><strong>Funder Name</strong></td><td>{{$emergency->name}}</td></tr>
                            <tr><td scope="col"><strong>Fund Amount</strong></td><td>{{$emergency->amount}}</td>  </tr>
                            <tr><td scope="col"><strong>Address </strong></td><td>{{$emergency->address}}</td> </tr>
                            <tr><td scope="col"><strong>Fund Collected For</strong></td><td>{{$emergency->fund_for}}</td> </tr>

                        </thead>
                       
                    </table> 
                 
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
