@extends('layouts.master')
@section('title') {{'All CARDS'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS All CARDS INFORMATION @if(Auth::user()->role == 1) <a href="{{route('card.create')}}" class="btn btn-primary float-right mb-1">Add Card</a> @endif </h4> 
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
                            <th scope="col">Father Name</th>  
                            <th scope="col">Mobile</th> 
                            <th scope="col">Address</th> 
                            <th scope="col">Blood Group</th> 
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($cards as $card)
                            <tr> 
                                <td>{{$card->id}}</td>
                                <td>{{$card->name}}</td>
                                <td>{{$card->father_name}}</td>
                                <td>{{$card->mobile}}</td>
                                <td>{{$card->address}}</td>
                                <td>{{$card->bgroup}}</td>
                                 
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td>
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('card.edit',$card->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('card.destroy',$card->id)}}"
                                        onsubmit="return confirm('Are you sure to delete card information?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('card.show',$card->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('card.show',$card->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
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
