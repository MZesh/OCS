@extends('layouts.master')
@section('title') {{'Donation'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS DONATION FUNDS</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <form action="{{route('doners.store')}}"  method="POST">
                    @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Doner Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Doner Name" name="name" >
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Donation Amount:</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Donation Amount" name="amount" >
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="dco" class="form-label">Donation C/O:</label>
                            <input type="text" class="form-control" id="dco" placeholder="Enter Donation C/O" name="dco" >
                          </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Doner</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection