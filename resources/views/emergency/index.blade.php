@extends('layouts.master')
@section('title') {{'Donation'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">ADD EMERGENCY FUNDS</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <form action="{{route('emergency.store')}}"  method="POST">
                    @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter  Name" name="name" >
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Fund Amount:</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Fund Amount" name="amount" >
                          </div>
                          <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                          </div> 
                          <div class="mb-3 mt-3">
                            <label for="ffor" class="form-label">Fund For:</label>
                            <input type="text" class="form-control" id="ffor" placeholder="Enter Reason of fund" name="ffor" >
                          </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Fund</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection