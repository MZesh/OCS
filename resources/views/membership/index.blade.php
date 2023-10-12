@extends('layouts.master')
@section('title') {{'New Membership'}} @endsection

@section('content')
<div class="container mt-5 mb-4">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">OCS Membership Form</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('membership.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" >
                
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="fname" class="form-label">Father Name:</label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter Father Name" name="fname" >
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="nic" class="form-label">NIC No:</label>
                            <input type="text" class="form-control" id="nic" placeholder="Enter NIC" name="nic" >
                          </div>
                         <div class="mb-3">
                            <label for="contact" class="form-label">Contact No Pak:</label>
                            <input type="number" class="form-control" id="contact" placeholder="Enter Contact No Pak" name="contact" >
                          
                            </div>
                         
                            <div class="mb-3">
                            <label for="address">Address Pak:</label>
                            <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                          </div>

                          <div class="mb-3 mt-3">
                            <label for="iqama" class="form-label">Iqama No:</label>
                            <input type="text" class="form-control" id="iqama" placeholder="Enter iqama no" name="iqama" >
                          </div>

                          <div class="mb-3">
                            <label for="waddress">Work Address:</label>
                            <textarea class="form-control" rows="5" id="waddress" name="waddress"></textarea>
                          </div>
                        
                          <div class="mb-3">
                            <label for="scontact" class="form-label">Saudi Contact No:</label>
                            <input type="number" class="form-control" id="scontact" placeholder="Enter Saudi Contact No" name="scontact" >
                          
                        </div>
                        <div class="mb-3">
                            <label for="rcontact" class="form-label">Contact No Relative:</label>
                            <input type="number" class="form-control" id="rcontact" placeholder="Enter Contact No of Relative" name="rcontact" >
                          
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Add Picture:</label>
                            <input type="file" class="form-control" id="file"  name="file" >
                          
                        </div>
                          
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Create Membership</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection