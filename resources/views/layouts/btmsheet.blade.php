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
		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($products as $product)
		    <tr>
		      <td style="height:50px;">
		      <div class="chip">
    		  {{ HTML::image($product->image, '', array('class' => 'circle left', 'width' => 25, 'height' => 25)) }}
               {{ $product->name }}
               <i class="material-icons">close</i>
  			  </div>
  			  </td>
		      <td style="height:50px;">{{ $product->price }}</td>
		      <td style="height:50px;"><input value="1" style="width:50px; position:relative; padding-top:-100px; padding-bottom:-100px;"></input></td>
		      <td style="height:50px;">{{ $product->count() }}</td>
		      
		    </tr>
		    @endforeach
		  </tbody>
		</table>

		<div class="modal-footer row">
		<span class="col push-s1 s5 left btn-large lighten-2">Total: ₱ {{ $product->count() }}</span>
    	<a href="#!" class="col pull-s1 s5 right red lighten-2 modal-action modal-close waves-effect waves-light btn-large">Check Out</a>
    	<div>
    	
    	</div>
		</div> <!-- End Modal Footer Div -->
		</div> <!-- End First Col -->
      @endif
		
      
    </div> <!-- End Div Row -->
    
      

    </div> <!-- End Modal Content -->

  </div> <!-- End BottomSheet Div -->