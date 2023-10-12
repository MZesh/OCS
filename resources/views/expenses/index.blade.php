@extends('layouts.master')
@section('title') {{'Expenses'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS EXPENSE FORM</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('expense.store')}}"  method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="expense">Expense Detail:</label>
                        <textarea class="form-control" rows="5" id="expense" name="expense"></textarea>
                      </div> 
                        <div class="mb-3 mt-3">
                            <label for="budget" class="form-label">Total Budget:</label>
                            <input type="number" class="form-control" id="budget" placeholder="Enter Total Budget" name="budget" >
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="texp" class="form-label">Total Expenses:</label>
                            <input type="number" class="form-control" id="texp" placeholder="Enter Total Expense" name="texp" >
                          </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Expenses</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection