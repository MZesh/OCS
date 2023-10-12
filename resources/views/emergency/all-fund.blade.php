@extends('layouts.master')
@section('title') {{'Donation'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS All Emergency Fund Information @if(Auth::user()->role == 1) <a href="{{route('emergency.create')}}" class="btn btn-primary float-right mb-1">Add Fund</a> @endif </h4> 
                        <div class="input-group">
                            <input type="text" id="myInput" class="form-control" placeholder="Search Register Member">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success text-center  mt-2 mb-2" id="btn-calc-fund">Calculate Total Paid Amount</button>
                    <button class="btn btn-info text-center float-right  mt-2 mb-2" id="btn">print</button>
                   <div id="#printarea">
                    <table class="table" id="payment-table">
                        <thead>
                            <tr>
                            <th scope="col">S NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>  
                            <th scope="col">Address</th> 
                            <th scope="col">Reason</th> 
                            <th scope="col" class="action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($funds as $fund)
                            <tr> 
                                <td>{{$fund->id}}</td>
                                <td>{{$fund->name}}</td>
                                <td>{{$fund->amount}}</td>
                                <td>{{$fund->address}}</td>
                                <td>{{$fund->fund_for}}</td>
                                 
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td class="action">
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('emergency.edit',$fund->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('emergency.destroy',$fund->id)}}"
                                        onsubmit="return confirm('Are you sure to delete fund information?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('emergency.show',$fund->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('emergency.show',$fund->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @endif 
                                </div>
                                </td>
                              </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <h4 class="text-info text-center mt-2" id="total"></h4> 
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
