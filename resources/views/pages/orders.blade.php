<!--Import App Template-->
@extends('app')

@section('head')
<!--Import Custom CSS-->
{!! Html::style('css/parsley.css') !!}
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
		      <th style="height:50px;">Payment Details</th>
		      <th style="height:50px; width:10px;"></th>
		      <th style="height:50px; width:10px;"></th>
		      <th style="height:50px; width:10px;"></th>
		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($user->orders as $order)
			
		    <tr id="deleteOrder{{ $order->id }}">
		      <td style="height:50px;">
    		  {{ $order->id }}
  			  </td>
		      <td style="height:50px;">
		      <a href="#viewGateway{{ $order->id }}" class="modal-trigger modal-mop loadMOP" id="gateway{{ $order->id }}" onclick="loadMOP({{ $order->id }});">{{ $order->mop->name }}</a>
		      <div id="viewGateway{{ $order->id }}" class="modal">
  			<!-- Confirm Deletion! -->
    		<div class="modal-content reverttable">


	        <blockquote>
	          <h5>Settle Payment @</h5>
	        </blockquote>
	          <div class="row reverttable">
	          <div class="s12 reverttable" id="viewMOP{{ $order->id }}">

	          <h4 class=" center flow-text">LOADING DATA...</h4>

	          </div>
	          </div>
	    
        
 			</div>
 			<div class="modal-footer modal-fixed-footer">
    		   <a href="#!" class="col s10 push-s1 m2 push-m5 push-l5 l2 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>

  </div>
		      </td>
		      <td style="height:50px;" id="status{{ $order->id }}">{{ $order->status }}</td>
		      <td style="height:50px;">{{ $order->method }}</td>
		      <td style="height:50px;">₱ {{ $order->sub_total }}</td>
		      <td style="height:50px;">₱ {{ $order->shipment_fee }}</td>
		      <td style="height:50px;">₱ {{ $order->tax }}</td>
		      <td style="height:50px;">₱ {{ $order->total }}</td>
		      <!-- Make AJAX CALL TO ADD COMMENT -->
		      {{-- @can('add-order-comment', $order) --}}
		      <td style="height:50px;">{{ $order->comment }}
		      </td>

		      <!-- Dynamic Form Submit -->

		      <td>
				<!-- Show Form Receipt Info Submit -->
	      <a href="#viewModalFormReceipt{{ $order->mop->id }}" class="modal-trigger modal-form-receipt waves-effect waves-circle waves-amber btn-floating white left z-depth-0 tooltipped" data-position="left" data-delay="50" data-tooltip="Submit Receipt Info"><i class="material-icons right" style="color:teal;">receipt</i></a>

	      <!-- Initialize modal-form-receipt in jquery -->
  			<div id="viewModalFormReceipt{{ $order->mop->id }}" class="modal">

  			<form action="postFormReceipt" method="POST" id="postFormReceipt{{ $order->mop->id }}" data-parsley-validate>

    		<div class="modal-content">


	        <blockquote>
	          <h5>Submit Your {{ $order->mop->name }} Receipt</h5>
	        </blockquote>
	          <div class="row">
	          <div class ="col s12">
	           
			   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			   <input type="hidden" name="order_id" value="{{ $order->id }}"/>
				 
			   <div class="input-field col s12">
		    	  <input id="transaction_no{{ $order->id }}" type="text" name="transaction_no" tabindex="1" required="" data-parsley-required-message="Transaction No. is Required" data-parsley-maxlength="60" data-parsley-maxlength-message="You Exceeded The Character Limit!" data-parsley-type="alphanum" data-parsley-type-message="Alpha Numeric Characters Only" data-parsley-trigger="change focusout"
				  @if($order->mop->transaction_no)
				  value = "{{ $order->mop->transaction_no }}"
				  @endif
		    	  />
          		<label for="transaction_no{{ $order->id }}">Transaction No. / Receipt No.</label>
   			   </div>	  
			   <div class="input-field col s12">
		    	  <input id="account_name{{ $order->id }}" type="text" name="account_name" tabindex="2" required="" data-parsley-required-message="AccountName/SenderName" data-parsley-minlength="2" data-parsley-minlength-message="AccountName/SenderName Too Short!" data-parsley-maxlength="60" data-parsley-maxlength-message="You Exceeded The Character Limit!" data-parsley-pattern="/^[a-zA-Z0-9\s]*$/" data-parsley-pattern-message="Alpha Numeric and space Only" data-parsley-trigger="change focusout"
				  @if($order->mop->account_name)
				  value = "{{ $order->mop->account_name }}"
				  @endif
		    	  />
          		<label for="account_name{{ $order->id }}">Account Name / Sender Name</label>
   			   </div>
   			   <div class="input-field col s12">
		    	  <input id="account_id{{ $order->id }}" type="text" name="account_id" tabindex="3" required="" data-parsley-required-message="AccountID/MobileNo." data-parsley-minlength="2" data-parsley-minlength-message="AccountID/MobileNo Too Short!" data-parsley-maxlength="60" data-parsley-maxlength-message="You Exceeded The Character Limit!" data-parsley-type="alphanum" data-parsley-type-message="Alpha Numeric Characters Only" data-parsley-trigger="change focusout"
				  @if($order->mop->account_id)
				  value = "{{ $order->mop->account_id }}"
				  @endif
		    	  />
          		<label for="account_id{{ $order->id }}">Card ID/ Mobile No.</label>
   			   </div>
   			   <div class="input-field col s12">
		    	  <input id="amount{{ $order->id }}" type="text" name="amount" tabindex="4" required="" data-parsley-required-message="AccountID/MobileNo." data-parsley-maxlength="60" data-parsley-maxlength-message="You Exceeded The Character Limit!" data-parsley-pattern="^[1-9]\d*(\.\d+)?$"
		    	  data-parsley-pattern-message="Should be an Integer 100.00" data-parsley-trigger="change focusout"
				  @if($order->mop->amount)
				  value = "{{ $order->mop->amount }}"
				  @endif
		    	  />
          		<label for="amount{{ $order->id }}">Amount Transfered</label>
   			   </div>
   			   
   			   <div class="input-field col s12">
		    	  <input id="datepaid{{ $order->id }}" type="text" name="date_paid" tabindex="5" required="" data-parsley-required-message="Date Paid Required" data-parsley-trigger="change focusout"
		    	  data-parsley-pattern="/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/"
		    	  data-parsley-pattern-message="Must be a Valid Date Format dd/mm/yyyy"
				  @if($order->mop->date_paid)
				  value = "{{ $order->mop->date_paid }}"
				  @endif
		    	  />
          		<label for="datepaid{{ $order->id }}">Date Paid</label>
   			   </div>

    		

	          </div>
	          </div>
	    
        
 			</div>
 			<div class="modal-footer modal-fixed-footer">
    		   <button class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large  waves-effect waves-light btn-flat" type="submit" name="action" >Upload</button>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>

    </form>
  </div> <!-- ENd MOdal Div -->
		      </td>
		      <!-- End of Dynamic Form Submit -->
		      {{-- @endcan --}}
			<td style="height:50px;">
			<form action="viewItemOrder" method="POST" id="itemOrderForm{{ $order->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input id="orderItem{{ $order->id }}" name="id" type="hidden" value="{{ $order->id }}" >
		      <a href="#viewModalItemOrder{{ $order->id }}"  class="modal-trigger modal-itemorder waves-effect waves-circle waves-red btn-floating white left z-depth-0 tooltipped" data-position="left" data-delay="50" data-tooltip="View Your Order Items" ><i class="material-icons" style="color:teal;" onclick="viewItemOrder({{ $order->id }})">visibility</i></a>
			 </form>
			<div id="viewModalItemOrder{{ $order->id }}" class="modal">
    		<div class="modal-content">


	        <blockquote class="center">
	          <h5>Your Order Specifics</h5>
	        </blockquote>
	          <div class="row">
	          <div class ="col s12" id="itemOrderModal{{ $order->id }}">
	           <h3>Loading Data...</h3>

	          </div> <!-- ENd Col Div -->
	          </div> <!-- ENd Div Row -->
    		<div class="modal-footer">
      <a href="#!" class="col s10 push-s1 m2 push-m5 push-l5 l2 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>
        
 			</div><!-- ENd MOdal Content -->
    
  </div> <!-- ENd MOdal Div -->
	      	</td>
			<!-- Make AJAX CALL REQUEST ON CHANGE -->
		      {{-- @can('edit-order', Order::class) --}}
		      <td style="height:50px; width:10px;">
		      <!-- Show Add Receipt MOdal -->
	      <a href="#viewModalReceipt{{ $order->id }}" class="modal-trigger modal-receipt waves-effect waves-circle waves-green btn-floating white left z-depth-0 tooltipped" data-position="left" data-delay="50" data-tooltip="Upload Your Receipt"><i class="material-icons right" style="color:blue;">file_upload</i></a>
  			<div id="viewModalReceipt{{ $order->id }}" class="modal">
  			<form action="postReceipt" method="POST" id="postReceiptForm{{ $order->id }}" enctype="multipart/form-data" onsubmit="submitReceipt({{ $order->id }}); return false;">
    		<div class="modal-content">


	        <blockquote class="center">
	          <h5>Upload Your Receipt</h5>
	        </blockquote>
	          <div class="row">
	          <div class ="col s12">
	           
			   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				  <input type="hidden" name="id" value="{{ $order->id }}"/>
			      <div class="file-field input-field">
				      <div class="btn">
				        <span>Attach Receipt</span>
				        <input type="file" name="attachment">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text"
						@if($order->attachment)
						{{ $order->attachment }}
						@endif
				        >
			      	  </div>
	    		  </div>
    		   
    		

	          </div>
	          </div>
	    
        
 			</div>
 			<div class="modal-footer modal-fixed-footer">
    		   <button class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat" type="submit" name="action" >Upload</button>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>
    </form>
  </div> <!-- ENd MOdal Div -->

		      </td>
		      {{-- @endcan --}}
		      
      	 	  
		      <!-- Make AJAX CALL ON CLICK -->
		      {{-- @can('delete-orders', $order) --}}
		      <td style="height:50px; width:10px;" class="reverttable">
		      <a href="#deleteOrderModal{{ $order->id }}" class="modal-trigger modal-delete waves-effect waves-circle waves-green btn-floating white left z-depth-0"><i class="material-icons right" style="color:#b71c1c;">close</i></a>

		      <div id="deleteOrderModal{{ $order->id }}" class="modal">
  			<!-- Confirm Deletion! -->
    		<div class="modal-content">


	        <blockquote class="center">
	          <h4>DELETE ORDER</h4>
	        </blockquote>
	          <div class="row">
	          <div class="s12">

	          <h4 class=" center flow-text">Are You Sure You?</h4>

	          </div>
	          </div>
	    
        
 			</div>
 			<div class="modal-footer modal-fixed-footer">
    		   <form action="deleteOrder" method="POST" id="deleteOrderForm{{ $order->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input id="deleteOrder{{ $order->id }}" name="order_id" type="hidden" value="{{ $order->id }}" >
		      <a href="#!" onclick="deleteOrder({{ $order->id }});" class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat">Confirm</a>
			 </form>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Cancel</a>
    		</div>

  </div>

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
{!! Html::script('js/parsley.min.js') !!}
@include('layouts.forms.submitreceipt')
@include('layouts.forms.viewitemorder')
@endsection