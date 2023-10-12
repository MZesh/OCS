@extends('layouts.master')
@section('title') {{'Expense Overview'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS Expense Overview<a href="{{route('expense.index')}}" class="btn btn-primary float-right mb-1">View All Expenses</a></h4> 
                         
                    </div>
                    
                        <table class="table mb-3">
                            <thead>
                                <tr><td></td> <td><span class="float-right">DATE: {{$expense->created_at}}</span></td></tr>
                                <tr> <td scope="col"><strong >R NO</strong></td><td>{{$expense->id}}</td></tr>
                                <tr> <td scope="col"><strong>Name</strong></td><td>{{$expense->expense_detail}}</td></tr>
                                <tr><td scope="col"><strong>Father Name</strong></td><td>{{$expense->total_budget}}</td>  </tr>
                                <tr><td scope="col"><strong>Contact Pak</strong></td><td>{{$expense->total_expense}}</td> </tr>
                            
                                
                            </thead>
                        
                        </table> 
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;width:100px;"></div>
@endsection
