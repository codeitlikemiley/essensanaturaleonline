<div class="row">
		<div class="col s12 m12 l12">
		@if(Cart::count())
		<h4>Cart Items</h4>
		
		<table class="bordered highlight responsive-table">
		  <thead>
		    <tr>
		      <th style="height:50px;">Name</th>
		      <th style="height:50px;">Price</th>
		      <th style="height:50px;">Quantity</th>
		      <th style="height:50px;">Total</th>
		      <th style="height:50px; width:10px;"></th>
		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($cart as $item)
		    <tr>
		      <td style="height:50px;">
    		  {{ $item->name }}
  			  </td>
		      <td style="height:50px;">₱ {{ $item->price }}</td>
		      <td style="height:50px;">
		      <!--  Update ITEM AJAX -->
			  <form action="updateItem" method="POST" id="updateItemForm{{ $item->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input type="hidden" name="product_id" value="{{ $item->id }}"/>
		      <input id="updateQty{{ $item->id }}" name="qty" onchange="updateProduct({{ $item->id }})" value="{{ $item->qty }}" style="width:50px; position:relative; padding-top:-100px; padding-bottom:-100px;" class="qtype"></input>
			  </form>
		      </td>
		      <td style="height:50px;">₱ {{ $item->subtotal }}</td>
		      <!--  REMOVE ITEM AJAX -->
		      <td style="height:50px; width:10px;">
			  <form action="removeCartItem" method="POST" id="removeItemForm{{ $item->id }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			  <input id="removeProduct{{ $item->id }}" name="product_id" type="hidden" value="{{ $item->id }}" >
		      <a href="#!" onclick="removeProduct({{ $item->id }});" class="waves-effect waves-circle waves-red btn-floating white left z-depth-0"><i class="material-icons" style="color:red;">close</i></a>
			 </form>
		      </td>
		       
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<div class="row">
		<ul class="collection with-header">
        <li class="collection-header"><h4>Amount Payable</h4></li>
        <li class="collection-item highlight"><div><blockquote>
      		<h4>Sub-Total : <span class="currency">₱</span><span id="subtotal">{{ $subtotal }}</span></h4>
    		</blockquote></div>
		</li>
		<li class="collection-item highlight"><div><blockquote>
      		<h4>Tax : <span class="currency">₱</span><span id="tax">{{ $tax }}</span></h4>
    		</blockquote></div>
		</li>
		<li class="collection-item highlight"><div><blockquote>
      		<h4>Shipping Fee : <span class="currency">₱</span><span id="shippingfee">{{ $shippingfee }}</span></h4>
    		</blockquote></div>
		</li>
		<li class="collection-item highlight"><div><blockquote>
      		<h4>Total : <span class="currency">₱</span><span id="total">{{ $total }}</span></h4>
    		</blockquote></div>
		</li>
        
      </ul>
		</div><!-- End Payable Div-->
		
		</div> <!--End Col Div -->

		<div class="modal-footer row">
		
		<form action="destroyCart" method="POST" id="destroyCart">
       <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<a href="#!" onclick="removeCart();" class="col s6 push-m1 m5 push-l1 l5 left red darken-4 modal-action modal-close waves-effect waves-light btn-large">Remove Cart</a>
		</form>
		<!-- ADD Check Out AJAX -->
    	<a href="checkout" class="col s6 pull-m1 m5 pull-l1 l5 right teal lighten-2 modal-action modal-close waves-effect waves-light btn-large">Check Out</a>
    	@else
			
			<div class="row">
				<div class="col s12">
					<div class="card red lighten-2" style="height:125px">
						<div class="card-content white-text valign-wrapper center-align">
							<i class="material-icons left v-align">shopping_cart</i>
							
							<span class="card-title v-align">
							Cart is Empty...</span>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn-large waves-effect waves-light card-action right modal-action modal-close">Close</a>
					</div>
				</div>
			</div>
		@endif
		</div> <!-- End Cart Modal Footer Div -->
		</div> <!-- End Cart Row -->


