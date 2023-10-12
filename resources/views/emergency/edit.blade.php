@extends('layouts.master')
@section('title') {{'Fund'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS  FUNDS UPDATE</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <form method="POST" action="{{route('emergency.update',$emergency->id)}}">
                    @csrf
                    @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label"> Name:</label>
                            <input type="text" class="form-control" value="{{$emergency->name}}" id="name" placeholder="Enter Doner Name" name="name" >
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" class="form-control" value="{{$emergency->amount}}" id="amount" placeholder="Enter Donation Amount" name="amount" >
                          </div>
                          <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="5" id="address" name="address">{{$emergency->address}}</textarea>
                          </div> 
                          <div class="mb-3 mt-3">
                            <label for="ffor" class="form-label">Donation C/O:</label>
                            <input type="text" class="form-control" id="ffor" value="{{$emergency->fund_for}}" placeholder="Enter Reason of fund" name="ffor" >
                          </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Fund</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection