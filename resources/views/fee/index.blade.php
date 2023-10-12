@extends('layouts.master')
@section('title') {{'Fee'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS Registration Fees</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('fee.store')}}"  method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name">Select Member</label> 
                        <select class="form-select form-control" id="name-select" name="id" aria-label="Default select example"> 
                           @foreach($members as $member)
                            <option value="{{$member->id}}" selected>{{$member->name}}</option>
                            @endforeach
                             
                        </select>
                        <input type="hidden" class="form-control" id="name" placeholder="Enter Amount" name="name" >
                    </div> 
                     
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount" >
                
                        </div> 
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Registration Fee</button>
                        </div>
                          
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection