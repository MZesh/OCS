@extends('layouts.master')
@section('title') {{'Payment'}} @endsection
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-primary text-center">OCS PAYMENT</h4></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                @endif
                <form action="{{route('payment.store')}}"  method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name">Select Member</label> 
                        <select class="form-select form-control" id="name-select" name="id" aria-label="Default select example"> 
                           @foreach($members as $member)
                            <option value="{{$member->id}}" selected>{{$member->name}}</option>
                            @endforeach
                             
                        </select>
                        <input type="hidden" class="form-control" id="name" placeholder="Enter Amount" name="name" >
                    </div> 
                    
                          <div class="mb-3 mt-3">
                            <label for="months">Payment of Month:</label>
                            <select class="form-select form-control" name="months" aria-label="Default select example">
                                <option value="Jan" selected> January</option>
                                <option value="Feb" >Febuary</option> 
                                <option value="March" >March</option> 
                                <option value="April" >April</option> 
                                <option value="May" >May</option> 
                                <option value="Jun" >Jun</option> 
                                <option value="July" >July</option> 
                                <option value="Aug" >August</option> 
                                <option value="Sep" >September</option> 
                                <option value="Oct" >October</option> 
                                <option value="Nov" >November</option> 
                                <option value="Dec" >December</option> 
                                 
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount" >
                
                        </div> 
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block ">Save Payment</button>
                        </div>
                        <button type="button" name="button" id="modal-btn" class="btn btn-primary btn-block hide" data-toggle="modal" data-target="#exampleModal">Print</button>
                        
                    </form>
                    @if(Session::has('success'))
                    <div id="#printarea">      
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Invoice for month :  {{ session('success.3') }}</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                               <table class="table mt-2 bordered" id="payment-table">
                                   <thead>
                                    <tr> <th class="text-primary " colspan="2"> Reg No: OCS-{{ session('success.1') }}   </th> <th class="text-warning">  Type:  Monthly Payment </th> </tr>
                                   <tr> <th class="text-info">  Name </th><th class="text-info">  Amount</th><th class="text-info">  Date</th>  </tr>
                                    
                                     <tr><th class="text-info">   {{ session('success.2') }} </th><th class="text-info">   {{ session('success.4') }}</th> <th class="text-info">   {{ session('success.5') }}</th>  </tr>
                                     <tr> <th class="text-success text-right" colspan="3"> Status: Paid   </th>  </tr>
                                      
                                   </thead> 
                               </table> 
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary action" data-dismiss="modal">Close</button>
                             <button type="button" id="btn" class="btn btn-primary action">Print</button>
                           </div>
                         </div>
                       </div>
                     </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection