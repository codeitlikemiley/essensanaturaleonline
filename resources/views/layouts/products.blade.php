
<div class="row container">
@foreach ($products as $product)
<div class="col s12 m4 l4">

<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{ $product->image }}">
    </div>
    <div class="card-content">
      <span class="card-title  amber-text text-darken-4 truncate">{{ $product->name }}</span>
      <a href="#!"><i class="material-icons activator right">search</i></a>
      <a href="#!"><i class="material-icons right">add_shopping_cart</i></a>
      
      <p>₱{{ $product->price }}</p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $product->name }}<i class="material-icons right">close</i></span>
      <p>{{ $product->description }}</p>
    </div>
  </div> <!-- End Card Div -->

</div> <!-- Card Column -->
@endforeach

</div>
<!-- Paginator Column -->
<div class="center" id="page">{!! (new Landish\Pagination\Materialize($products))->render() !!}</div>



