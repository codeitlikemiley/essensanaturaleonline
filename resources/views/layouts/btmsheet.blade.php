<!-- Cart Bottom Sheet -->
  <div id="cartbtn" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Cart</h4>
      @if (Auth::user())
    	Please Log In Your Account!
      @else
		<!-- Need to Make the Qty an Input -->
		<!-- Add Remove Button -->
		<table class="bordered highlight responsive-table">
		  <thead>
		    <tr>
		      <th style="height:50px;">Product Name</th>
		      <th style="height:50px;">Description</th>
		      <th style="height:50px;">Price</th>
		      <th style="height:50px;">Quantity</th>
		      

		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($products as $product)
		    <tr>
		      <td style="height:50px;">
		      <div class="chip">
    		  {{ HTML::image($product->image, $product->name, array('class' => 'circle left', 'width' => 50, 'height' => 50)) }}
               {{ $product->name }}
               <i class="material-icons">close</i>
  			  </div>
  			  </td>
		      
		      <td style="height:50px;"><div class="truncate"><p>{{ $product->description }}</p></div></td>
		      <td style="height:50px;"><div><p>{{ $product->price }}</p></div></td>
		      <td style="height:50px;"><div><input value="1" style="width:50px;"></input></div></td>
		      
		    </tr>
		    @endforeach
		  </tbody>
		</table>
      @endif
		
      
    </div>
    <div class="modal-footer">
    <p class="right">Total: 10000</p>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Check Out</a>

    </div>
  </div>