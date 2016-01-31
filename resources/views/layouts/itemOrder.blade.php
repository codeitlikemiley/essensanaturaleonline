<div class="row reverttable">
		<div class="col s12 m12 l12">
		@if($itemOrder->count())
		
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
		  	@foreach ($itemOrder as $item)
		    <tr>
		      <td style="height:50px;">
    		  {{ $item->name }}
  			  </td>
		      <td style="height:50px;">₱ {{ $item->price }}</td>
		      <td style="height:50px;">
		      <!--  Update ITEM AJAX -->
			  {{ $item->qty }}
		      </td>
		      <td style="height:50px;">₱ {{ $item->total }}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		
		@endif
		</div> <!--End Col Div -->

		
</div> <!-- End Order Item -->


