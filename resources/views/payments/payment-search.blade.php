@extends('layouts.master')
@section('title') {{'Payments'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS PAYMENT INFORMATION </h4> 
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
                        @if(count($payments) > 0)
                        
                    </div>
                    <button class="btn btn-info float-right mt-2" id="btn">Print</button>
                    <div id="#printarea">
                    <table class="table mt-2" id="payment-table">
                        <thead>
                            <tr> <th class="text-info">Months </th><th class="text-info">  Payments</th><th class="text-info">  Date</th> @if(Auth::user()->role == 1)<th class="text-Danger action">  Action</th> @endif </tr>
                            <tr>
                         <?php $i=1;?>    
                        @foreach($payments as $payment)
                        <h4 class="text-primary text-center mt-2 name<?php echo $i++;?>">Name: {{$payment->name}}   &nbsp; Reg No: OCS-{{$payment->regno}}</h4>
                            <th scope="col" class="text-success">{{$payment->months}} </th><th class="text-success">{{$payment->amount}}</th><th class="text-success">{{$payment->created_at}}</th>
                            @if(Auth::user()->role == 1)
                            <th class="action">
                                <div class="d-flex ">
                                  <a href="{{route('payment.edit',$payment->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                  <form 
                                      method="POST"
                                      action="{{route('payment.destroy',$payment->id)}}"
                                      onsubmit="return confirm('Are you sure to delete payment information?')"
                                      >
                                      @csrf
                                      @METHOD('DELETE')
                                      <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                  </form>
                                </div>
                              </th>
                              @endif 
                            </tr>
                            @endforeach  
                        </thead> 
                    </table> 
                    <h4 class="text-info text-center mt-2" id="total"></h4>
                    </div>
                    <button class="btn btn-success text-center  mt-2" id="btn-calc">Calculate Total Paid Amount</button>
                    @else
                    <h4 class="text-danger text-center mt-2">No result found for Name: {{$search_text}}</h4>
                 @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:140px;width:100px;"></div>
@endsection
