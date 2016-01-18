<!-- Cart Bottom Sheet -->
  <div id="cartbtn" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Cart</h4>
      @if (Auth::user())
    	Please Log In Your Account!
      @else
		<!-- Need to Make the Qty an Input -->
		<!-- Add Remove Button -->
		<table class="responsive-table">
		  <thead>
		    <tr>
		      <th>remove</th>
		      <th>id</th>
		      <th>name</th>
		      <th>description</th>
		      <th>price</th>
		      <th>qty</th>
		      <th>image</th>

		    </tr>

		  </thead>
		  <tbody>
		  	@foreach ($products as $product)
		    <tr>
		      <td><a href="#removeItem"><i class="material-icons" style="color:red;">indeterminate_check_box</i></a></td>
		      <td>{{ $product->id }}</td>
		      <td>{{ $product->name }}</td>
		      <td class="truncate">{{ $product->description }}</td>
		      <td>{{ $product->price }}</td>
		      <td>1</td>
		      <td>{{ HTML::image($product->image, $product->name, array('class' => 'circle', 'width' => 50, 'height' => 50)) }}</td>
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