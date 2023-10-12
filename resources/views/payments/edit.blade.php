@extends('layouts.master')
@section('title') {{'Payment'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS PAYMENT EDIT/UPDATE</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('payment.update',$payment->id)}}"  >
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="{{$payment->name}}" placeholder="Enter Name" name="name" >
            
                    </div> 
                    
                          <div class="mb-3 mt-3">
                            <label for="months">Payment of Month:</label>
                            <select class="form-select form-control" name="months" aria-label="Default select example">
                                <option value="Jan" @if($payment->months == 'Jan')selected @endif> January</option>
                                <option value="Feb" @if($payment->months == 'Feb')selected @endif >Febuary</option> 
                                <option value="March" @if($payment->months == 'March')selected @endif>March</option> 
                                <option value="April" @if($payment->months == 'April')selected @endif>April</option> 
                                <option value="May" @if($payment->months == 'May')selected @endif>May</option> 
                                <option value="Jun" @if($payment->months == 'Jun')selected @endif>Jun</option> 
                                <option value="July" @if($payment->months == 'July')selected @endif>July</option> 
                                <option value="August" @if($payment->months == 'August')selected @endif>August</option> 
                                <option value="September" @if($payment->months == 'September')selected @endif>September</option> 
                                <option value="October" @if($payment->months == 'October')selected @endif>October</option> 
                                <option value="November" @if($payment->months == 'November')selected @endif>November</option> 
                                <option value="December" @if($payment->months == 'December')selected @endif >December</option> 
                                 
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" class="form-control" id="amount" value="{{$payment->amount}}" placeholder="Enter Amount" name="amount" >
                
                        </div> 
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Payment</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection