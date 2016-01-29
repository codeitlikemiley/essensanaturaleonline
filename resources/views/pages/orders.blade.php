<!--Import App Template-->
@extends('app')

@section('head')
<!--Import Custom CSS-->
@endsection

@section('content')
<!--Import Content-->
<main>
<div class="row">
		<h4>Your Orders</h4>
		@if($user->orders)
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
		      {{-- @can('upload-receipt', $order) --}}
		      <td style="height:50px;">
		      
			  <form action="postReceipt" method="POST" id="postReceiptForm{{ $order->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input type="hidden" name="id" value="{{ $order->id }}"/>

		      <div class="file-field input-field small">
			      <div class="btn">
			        <span>Upload Your Receipt</span>
			        <input type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" id="attachReceipt{{ $order->id }}" name="attachment" type="text"
			        @if($order->attachment)
					value="{{ $order->attachment }}"
			        @endif
			        >
		      	  </div>
    		  </div>
			  </form>
		      </td>
		      {{-- @endcan --}}
		      
      	 	  
		      <!-- Make AJAX CALL ON CLICK -->
		      {{-- @can('delete-orders', $order) --}}
		      <td style="height:50px; width:10px;">
			  <form action="deleteOrder" method="POST" id="deleteOrderForm{{ $order->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input id="deleteOrder{{ $order->id }}" name="id" type="hidden" value="{{ $order->id }}" >
		      <a href="#!" onclick="deleteOrder({{ $order->id }});" class="waves-effect waves-circle waves-red btn-floating white left z-depth-0"><i class="material-icons" style="color:red;">close</i></a>
			 </form>
		      </td>
		      {{-- @endcan --}}
		       
		    </tr>
		    
		    @endforeach
		  </tbody>
		</table>
		@else
		<h4 class="header center orange-text">You Have No Order Yet!</h4>
		@endif
		
		

</div> <!-- End Div -->


</main>
@endsection

@section('footer')

@endsection