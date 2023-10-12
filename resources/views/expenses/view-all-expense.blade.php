@extends('layouts.master')
@section('title') {{'All Expenses'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS All Expenses Information @if(Auth::user()->role == 1) <a href="{{route('expense.create')}}" class="btn btn-primary float-right mb-1">Add Expense</a> @endif </h4> 
                        <div class="input-group">
                            <input type="text" id="myInput" class="form-control" placeholder="Search Register Member">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info float-right" id="btn">Print</button>
                    <div id="#printarea">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">S NO</th>
                            <th scope="col">Expense Detail</th>
                            <th scope="col">Total Budget</th>  
                            <th scope="col">Total Expense</th> 
                            <th scope="col">Date</th> 
                            <th scope="col" class="action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($expenses as $expense)
                            <tr> 
                                <td>{{$expense->id}}</td>
                                <td>{{$expense->expense_detail}}</td>
                                <td>{{$expense->total_budget}}</td>
                                <td>{{$expense->total_expense}}</td>
                                <td>{{$expense->created_at}}</td>
                                 
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td class="action">
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('expense.edit',$expense->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('expense.destroy',$expense->id)}}"
                                        onsubmit="return confirm('Are you sure to delete expenses information?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('expense.show',$expense->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('expense.show',$expense->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
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
</div>
<div style="height:150px;width:100px;"></div>
@endsection
