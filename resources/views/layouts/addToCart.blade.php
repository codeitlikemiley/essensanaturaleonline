
  <td style="height:50px;">
  {{ $item->name }}
	  </td>
  <td style="height:50px;">₱ {{ $item->price }}</td>
  <td style="height:50px;"><input id="item{{ $item->id }}" value="{{ $item->qty }}" style="width:50px; position:relative; padding-top:-100px; padding-bottom:-100px;"></input></td>
  <td style="height:50px;">₱ {{ $item->subtotal }}</td>
  <td style="height:50px; width:10px;"><a href="#" class="waves-effect waves-circle waves-red  removeItem btn-floating white left z-depth-0"><i class="material-icons" style="color:red;">close</i></a>
  </td>	       
