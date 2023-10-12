@extends('layouts.master')
@section('title') {{'Users'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS Users</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <form method="POST" action="{{route('user.update',$user->id)}}"  >
                    @csrf
                    @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label"> Name:</label>
                            <input type="text" class="form-control" value="{{$user->name}}" id="name" placeholder="Enter Doner Name" name="name" >
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" value="{{$user->email}}" id="email" placeholder="Enter Email" name="email" >
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="role">Role:</label>
                            <select class="form-select form-control" name="role" aria-label="Default select example">
                                <option value="1" @if($user->role == '1') selected @endif> Administrator</option>
                                <option value="0"  @if($user->role == '0') selected @endif>User</option> 
                                 
                                 
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update User</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection