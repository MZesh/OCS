@extends('layouts.master')
@section('title') {{'Registered Members'}} @endsection

@section('content') 
<div class="container mt-1 mb-4">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Registered Members Information  @if(Auth::user()->role == 1) <a href="{{route('membership.create')}}" class="btn btn-primary float-right mb-1">New Membership</a> @endif </h4> 
                        <div class="input-group">
                            <input type="text" id="myInput" class="form-control" placeholder="Search Register Member">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">R NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>  
                            <th scope="col">Contact Pak</th> 
                            <th scope="col">Address Pak</th>
                            <th scope="col">Iqama No</th>
                            <th scope="col">Work Address</th>
                            <th scope="col">Saudi Mobile No</th>
                            <th scope="col">Contact No Of Relative</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($members as $member)
                            <tr> 
                                <td>OCS-{{$member->id}}</td>
                                <td>{{$member->name}}</td>
                                <td>{{$member->father_name}}</td>
                                <td>{{$member->contact_pak}}</td>
                                <td>{{$member->address_pak}}</td>
                                <td>{{$member->iqama}}</td>
                                <td>{{$member->work_address}}</td>
                                <td>{{$member->contact_saudi}}</td>
                                <td>{{$member->contact_relative}}</td>
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td>
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('membership.edit',$member->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('membership.destroy',$member->id)}}"
                                        onsubmit="return confirm('Are you sure to delete membership?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('membership.show',$member->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('membership.show',$member->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @endif 
                                </div>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table> 
                 
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
