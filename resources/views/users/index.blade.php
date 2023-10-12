@extends('layouts.master')
@section('title') {{' Users'}} @endsection

@section('content') 
<div class="container mt-1 mb-4">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Users </h4> 
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
                            <th scope="col">S NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>  
                            <th scope="col">Role</th> 
                            <th scope="col">Created</th> 
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($users as $user)
                            <tr> 
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role == 1 ? 'Administrator':'User'}}</td>
                                <td>{{$user->created_at}}</td>
                                
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td>
                                  <div class="d-flex">
                                     
                                    <a href="{{route('user.edit',$user->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('user.destroy',$user->id)}}"
                                        onsubmit="return confirm('Are you sure to delete user?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                     
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
