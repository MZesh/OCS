@extends('layouts.master')
@section('title') {{'New Membership'}} @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">OCS Membership Form -- Eidt/Update</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('membership.update',$membership->id)}}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="{{$membership->name}}" placeholder="Enter Name" name="name" >
                
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="fname" class="form-label">Father Name:</label>
                            <input type="text" class="form-control" id="fname" value="{{$membership->father_name}}" placeholder="Enter Father Name" name="fname" >
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="nic" class="form-label">NIC No:</label>
                            <input type="text" class="form-control" id="nic" placeholder="Enter NIC" value="{{$membership->nic}}" name="nic" >
                          </div>
                         <div class="mb-3">
                            <label for="contact" class="form-label">Contact No Pak:</label>
                            <input type="number" class="form-control" id="contact" value="{{$membership->contact_pak}}" placeholder="Enter Contact No Pak" name="contact" >
                          
                            </div>
                         
                            <div class="mb-3">
                            <label for="address">Address Pak:</label>
                            <textarea class="form-control" rows="5" id="address" name="address">{{$membership->address_pak}}</textarea>
                          </div>

                          <div class="mb-3 mt-3">
                            <label for="iqama" class="form-label">Iqama No:</label>
                            <input type="text" class="form-control" id="iqama" value="{{$membership->iqama}}" placeholder="Enter iqama no" name="iqama" >
                          </div>

                          <div class="mb-3">
                            <label for="waddress">Work Address:</label>
                            <textarea class="form-control" rows="5" id="waddress" name="waddress">{{$membership->work_address}}</textarea>
                          </div>
                        
                          <div class="mb-3">
                            <label for="scontact" class="form-label">Saudi Contact No:</label>
                            <input type="number" class="form-control" id="scontact" value="{{$membership->contact_saudi}}" placeholder="Enter Saudi Contact No" name="scontact" >
                          
                        </div>
                        <div class="mb-3">
                            <label for="rcontact" class="form-label">Contact No Relative:</label>
                            <input type="number" class="form-control" id="rcontact" value="{{$membership->contact_relative}}" placeholder="Enter Contact No of Relative" name="rcontact" >
                          
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Add Picture:</label>
                            <input type="file" class="form-control" id="file"  name="file" >
                            <img src="{{Storage::url($membership->pic)}}" alt="{{$membership->name}}" style="width:60px;height:60px;">
                          
                        </div>
                          
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Membership</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection