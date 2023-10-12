@extends('layouts.master')
@section('title') {{'View Payment'}} @endsection

@section('content') 
<div class="container mt-1 mb-4">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Payments Information @if(Auth::user()->role == 1) <a href="{{route('payment.index')}}" class="btn btn-primary float-right mb-1">Make Payments</a> @endif </h4> 
                        <form action="{{route('payment.search')}}" method="GET">
                            <div class="input-group">
                                        <input type="text"  class="form-control" name='search' placeholder="Search Payments by Name or Reg No e.g(1001)">
                                        <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:200px;width:100px;"></div>
@endsection