@extends('layouts.master')
@section('title') {{'Donation'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS All Doners Information @if(Auth::user()->role == 1) <a href="{{route('doners.create')}}" class="btn btn-primary float-right mb-1">Add Doner</a> @endif </h4> 
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
                            <th scope="col">Doner Name</th>
                            <th scope="col">Donation Amount</th>  
                            <th scope="col">Doner C/O</th> 
                            <th scope="col">Date</th> 
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($doners as $doner)
                            <tr> 
                                <td>{{$doner->id}}</td>
                                <td>{{$doner->doner_name}}</td>
                                <td>{{$doner->amount}}</td>
                                <td>{{$doner->doner_co}}</td>
                                <td>{{$doner->created_at}}</td>
                                 
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td>
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('doners.edit',$doner->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('doners.destroy',$doner->id)}}"
                                        onsubmit="return confirm('Are you sure to delete doner information?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('doners.show',$doner->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('doners.show',$doner->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
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
