@extends('layouts.master')
@section('title') {{'Fee'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Fee INFORMATION <a href="{{route('fee.index')}}" class="btn btn-primary float-right mb-1">View Fee</a></h4> 
                         
                    </div>
                    <table class="table mb-3">
                        <thead>
                            <tr><td></td> <td><span class="float-right">DATE: {{$fee->created_at}}</span></td></tr>
                            <tr> <td scope="col"><strong >REG NO</strong></td><td>OCS-{{$fee->regno}}</td></tr>
                            <tr> <td scope="col"><strong>Name</strong></td><td>{{$fee->name}}</td></tr>
                            <tr><td scope="col"><strong>Fee Amount</strong></td><td>{{$fee->amount}}</td>  </tr> 

                        </thead>
                       
                    </table> 
                 
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
