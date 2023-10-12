@extends('layouts.master')
@section('title') {{'Registered Members'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Registered Member Information <a href="{{route('membership.index')}}" class="btn btn-primary float-right mb-1">View All Memberships</a></h4> 
                         
                    </div>
                    <div id="#printarea">
                    <table class="table mb-3" >
                        <thead>
                            <tr><td></td> <td><img src="{{Storage::url($membership->pic)}}" alt="{{$membership->name}}" class="float-right" style="width:100px;height:100px;"></td></tr>
                            <tr> <td scope="col"><strong >R NO</strong></td><td>OCS-{{$membership->id}}</td></tr>
                            <tr> <td scope="col"><strong>Name</strong></td><td>{{$membership->name}}</td></tr>
                            <tr><td scope="col"><strong>Father Name</strong></td><td>{{$membership->father_name}}</td>  </tr>
                            <tr><td scope="col"><strong>Contact Pak</strong></td><td>{{$membership->contact_pak}}</td> </tr>
                            <tr><td scope="col"><strong>Address Pak</strong></td><td>{{$membership->address_pak}}</td></tr>
                            <tr><td scope="col"><strong>Iqama No</strong></td><td>{{$membership->iqama}}</td></tr>
                            <tr><td scope="col"><strong>Work Address</strong></td><td>{{$membership->work_address}}</td></tr>
                            <tr><td scope="col"><strong>Saudi Mobile No</strong></td><td>{{$membership->contact_saudi}}</td></tr>
                            <tr><td scope="col"><strong>Contact No Of Relative</strong></td><td>{{$membership->contact_relative}}</td></tr>
                            
                            
                        </thead>
                       
                    </table> 
                </div>
                 <button class="btn btn-info float-right" id="btn">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
