
<div class="row container">
@foreach ($products as $product)
<div class="col s12 m4 l4">

<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{ $product->image }}">
    </div>
    <div class="card-content">
      <span class="card-title  amber-text text-darken-4 truncate">{{ $product->name }}</span>
      <a href="#!"><i class="material-icons right">search</i></a>
      <a href="#addProduct{{ $product->id }}" class="modal-trigger modal-pagination"><i class="material-icons right">add_shopping_cart</i></a>
      
      <p>₱{{ $product->price }}</p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $product->name }}<i class="material-icons right">close</i></span>
      <p>{{ $product->description }}</p>
    </div>
  </div> <!-- End Card Div -->
  <!-- Add Qty Modal -->
  <div id="addProduct{{ $product->id }}" class="modal">
    <div class="modal-content">


        <blockquote class="center">
          <h5>Add to Cart?</h5>
        </blockquote>
          <div class="row">
          <div class ="col s6 offset-s3">
           <form action="addProduct" method="POST" id="form{{ $product->id }}" onsubmit="addProduct({{ $product->id }});">
           <input type="hidden" name="product_id" value="{{ $product->id }}"/>
           <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
           <input id="qty{{ $product->id }}" name="qty" type="text" value="1">
           <label for="qty{{ $product->id }}">No. Of {{ $product->name }}</label>
          </form>
          </div>
          </div>
    
        
    </div>
    <div class="modal-footer">
      <a href="#!" onclick="addProduct({{ $product->id }});" class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat">Add To Cart</a>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    </div>
  </div> <!-- ENd MOdal Div -->

</div> <!-- Card Column -->
@endforeach

</div>
<!-- Paginator Column -->
<div class="center" id="page">{!! (new Landish\Pagination\Materialize($products))->render() !!}</div>



