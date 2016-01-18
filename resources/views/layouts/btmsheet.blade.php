<!-- Cart Bottom Sheet -->
  <div id="cartbtn" class="modal bottom-sheet">
    <div class="modal-content">
      
      @if (Auth::user())
    	Please Log In Your Account!
      @else
		<!-- Need to Make the Qty an Input -->
		<!-- Add Remove Button -->
		<div class="row">
		<div class="col s12 m12 l12">
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
		  	@foreach ($products as $product)
		    <tr>
		      <td style="height:50px;">
    		  {{ HTML::image($product->image, $product->name, array('class' => 'circle left', 'width' => 25, 'height' => 25)) }}<span> {{ $product->name }} </span>
  			  </td>
		      <td style="height:50px;">₱ {{ $product->price }}</td>
		      <td style="height:50px;"><input value="1" style="width:50px; position:relative; padding-top:-100px; padding-bottom:-100px;"></input></td>
		      <td style="height:50px;">₱ 500</td>
		      <td style="height:50px; width:10px;"><a href="#" class="waves-effect waves-circle waves-red  removeItem btn-floating white left z-depth-0"><i class="material-icons" style="color:red;">close</i></a></td>
		       
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<div class="row container">
		<div class="col s10 offset-s2 l6 offset-l6 m6 offset-m6">
			<blockquote class="large">
      		<h4>Total : <span>₱</span><span>1000</span></h4>
    		</blockquote>
		</div>
		
		</div>
		<div class="modal-footer row">
		<a href="#!" class="col s6 push-m1 m5 push-l1 l5 left blue lighten-2 modal-action modal-close waves-effect waves-light btn-large">Update Cart</a>
    	<a href="#!" class="col s6 pull-m1 m5 pull-l1 l5 right teal lighten-2 modal-action modal-close waves-effect waves-light btn-large">Check Out</a>
    	<div>
    	
    	</div>
		</div> <!-- End Modal Footer Div -->
		</div> <!-- End First Col -->
      @endif
		
      
    </div> <!-- End Div Row -->
    
      

    </div> <!-- End Modal Content -->

  </div> <!-- End BottomSheet Div -->