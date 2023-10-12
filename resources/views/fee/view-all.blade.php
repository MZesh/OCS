@extends('layouts.master')
@section('title') {{'Fee'}} @endsection

@section('content') 
<div class="container mt-1">
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                    <div class="card-header">
                        <h4 class="text-success text-center">OCS All Registration Fee @if(Auth::user()->role == 1) <a href="{{route('fee.create')}}" class="btn btn-primary float-right mb-1">Add Fee</a> @endif </h4> 
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
                             
                            <th scope="col" class="action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            
                            @foreach($fees as $fee)
                            <tr> 
                                <td>{{$fee->id}}</td>
                                <td>{{$fee->name}}</td>
                                <td>{{$fee->amount}}</td>
                                 
                                 
                                {{-- <td><img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="w-16 h-16 rounded"></td> --}}
                                
                                <td class="action">
                                  <div class="d-flex">
                                    @if(Auth::user()->role == 1)
                                    <a href="{{route('fee.edit',$fee->id)}}" class="text-info"><i class='fa fa-edit'></i></a>
                                    <form 
                                        method="POST"
                                        action="{{route('fee.destroy',$fee->id)}}"
                                        onsubmit="return confirm('Are you sure to delete fee information?')"
                                        >
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                    <a href="{{route('fee.show',$fee->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
                                    @else 
                                    <a href="{{route('fee.show',$fee->id)}}" class="text-primary"><i class='fa fa-eye'></i></a>
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
<button type="button" name="button" id="modal-btn" class="btn btn-primary btn-block hide" data-toggle="modal" data-target="#exampleModal">Print</button>
@if(Session::has('success'))
<div id="printareafee">      
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Invoice</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
           <table class="table mt-2 bordered" id="payment-table">
               <thead>
                <tr> <th class="text-primary " colspan="2"> Reg No: OCS-{{ session('success.1') }}   </th> <th class="text-warning">  Type:  Registration Fee </th> </tr>
               <tr> <th class="text-info">  Name </th><th class="text-info">  Amount</th><th class="text-info">  Date</th>  </tr>
                
                 <tr><th class="text-info">   {{ session('success.2') }} </th><th class="text-info">   {{ session('success.3') }}</th> <th class="text-info">   {{ session('success.4') }}</th>  </tr>
                 <tr> <th class="text-success text-right" colspan="3"> Status: Paid   </th>  </tr>
                  
               </thead> 
           </table> 
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary action" data-dismiss="modal">Close</button>
         <button type="button" id="btn-fee" class="btn btn-primary action">Print</button>
       </div>
     </div>
   </div>
 </div>
</div>
@endif
@endsection
