@extends('layouts.master')
@section('title') {{'Card Edit'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS CARD RECORD</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('card.update', $card->id)}}"  >
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" value="{{$card->name}}" id="name" placeholder="Enter Name" name="name" >
            
                    </div> 
                    <div class="mb-3 mt-3">
                        <label for="fname" class="form-label">Father Name:</label>
                        <input type="text" class="form-control" value="{{$card->father_name}}" id="fname" placeholder="Enter Father Name" name="fname" >
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="mobile" class="form-label">Mobile No:</label>
                        <input type="number" class="form-control" id="mobile" value="{{$card->mobile}}" placeholder="Enter Mobile Number" name="mobile" >
                      </div>
                    <div class="mb-3">
                        <label for="address">Address:</label>
                        <textarea class="form-control" rows="5" id="address" name="address">{{$card->address}}</textarea>
                      </div>  
                           
                          <div class="mb-3 mt-3">
                            <label for="bgroup">Blood Group:</label>
                            <select class="form-select form-control" name="bgroup" aria-label="Default select example">
                                <option value="A+" selected> A+</option>
                                <option value="A-" >A-</option> 
                                <option value="AB+" >AB+</option> 
                                <option value="B+" >B+</option> 
                                <option value="B-" >B-</option> 
                                <option value="O+" >O+</option> 
                                <option value="O-" >O-</option> 
                                 
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Card</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection