<!--Import App Template-->
@extends('app')

@section('head')
<!--Import Custom CSS-->
@endsection

@section('content')
<!--Import Content-->
<main>
@if($user->orders->count())
<div class="row">

		<h4>Your Orders</h4>
		
		<table class="bordered highlight responsive-table">
		  <thead>
		    <tr>
		      <th style="height:50px;">Order #</th>
		      <th style="height:50px;">Payment Gateway</th>
		      <th style="height:50px;">Status</th>
		      <th style="height:50px;">Method</th>
		      <th style="height:50px;">Sub Total</th>
		      <th style="height:50px;">Shipping Fee</th>
		      <th style="height:50px;">Tax</th>
		      <th style="height:50px;">Total</th>
		      <th style="height:50px;">Remarks</th>
		      <th style="height:50px;">Attachment</th>
		      <th style="height:50px; width:10px;"></th>
		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($user->orders as $order)
			
		    <tr>
		      <td style="height:50px;">
    		  {{ $order->id }}
  			  </td>
		      <td style="height:50px;">{{ $order->mop->name }}</td>
		      <td style="height:50px;">{{ $order->status }}</td>
		      <td style="height:50px;">{{ $order->method }}</td>
		      <td style="height:50px;">₱ {{ $order->sub_total }}</td>
		      <td style="height:50px;">₱ {{ $order->shipment_fee }}</td>
		      <td style="height:50px;">₱ {{ $order->tax }}</td>
		      <td style="height:50px;">₱ {{ $order->total }}</td>
		      <!-- Make AJAX CALL TO ADD COMMENT -->
		      {{-- @can('add-order-comment', $order) --}}
		      <td style="height:50px;">{{ $order->comment }}
		      </td>
		      {{-- @endcan --}}

			<!-- Make AJAX CALL REQUEST ON CHANGE -->
		      {{-- @can('edit-order', Order::class) --}}
		      <td style="height:50px;">
		      <!-- Show Add Receipt MOdal -->
	      <a href="#viewModelReceipt{{ $order->id }}" class="modal-trigger modal-receipt"><i class="material-icons right">file_upload</i></a>
  			<div id="viewModelReceipt{{ $order->id }}" class="modal">
    		<div class="modal-content">


	        <blockquote class="center">
	          <h5>Upload Your Receipt</h5>
	        </blockquote>
	          <div class="row">
	          <div class ="col s10 offset-s1">
	           {{-- {!! Form::open(array('url'=>'postReceipt','method'=>'POST', 'files'=>true, 'id' => 'postReceiptForm{{ $order->id }}')) !!} --}}
	           <form action="postReceipt" method="POST" id="postReceiptForm{{ $order->id }}" enctype="multipart/form-data" onsubmit="submitReceipt({{ $order->id }}); return false;">
			   {{-- {!! Form::token() !!} --}}
			   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				  <input type="hidden" name="id" value="{{ $order->id }}"/>
			      <div class="file-field input-field small">
				      <div class="btn">
				        <span>Upload Your Receipt</span>
				        <input type="file" name="attachment">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
			      	  </div>
	    		  </div>
    		   <div class="modal-footer">
    		   <button class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat" type="submit" name="action" >Upload Receipt</button>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>
    		</form>
			  {{-- {!! Form::close() !!} --}}
	          </div>
	          </div>
	    
        
 			</div>
    
  </div> <!-- ENd MOdal Div -->

		      </td>
		      {{-- @endcan --}}
		      
      	 	  
		      <!-- Make AJAX CALL ON CLICK -->
		      {{-- @can('delete-orders', $order) --}}
		      <td style="height:50px; width:10px;" id="deleteOrder{{ $order->id }}">
			  <form action="deleteOrder" method="POST" id="deleteOrderForm{{ $order->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input id="deleteOrder{{ $order->id }}" name="order_id" type="hidden" value="{{ $order->id }}" >
		      <a href="#!" onclick="deleteOrder({{ $order->id }});" class="waves-effect waves-circle waves-red btn-floating white left z-depth-0"><i class="material-icons" style="color:red;">close</i></a>
			 </form>
		      </td>
		      {{-- @endcan --}}
		       
		    </tr>
		    
		    @endforeach
		  </tbody>
		</table>
		
		
		

</div> <!-- End Div -->
@else
<div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center orange-text">YOU HAVE NO ORDER YET!</h1>
            <div class="row center">
                <h5 class="header col s12 light">Purchase Your First Order NOW</h5>
            </div>
            <div class="row center">
                <a href="/"  class="btn-large waves-effect waves-light orange">Purchase Now!</a>
            </div>

            <br><br>
        </div>
    </div>
@endif

</main>
@endsection

@section('footer')
@include('layouts.forms.submitreceipt')
@endsection