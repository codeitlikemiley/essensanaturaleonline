<!--Import App Template-->
@extends('app')

@section('head')
<!--Import Custom CSS-->
@endsection

@section('content')
<!--Import Content-->
<main>
<!--   Parallax Slider   -->
<div class="parallax-container">
<div class="slider">
    <ul class="slides">
      <li>
        <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
  </div>
<!--   Start Feature Row1   -->
<div class="row container">

	<div class="col s12 m4">
		  <div class="icon-block">
		    <h2 class="center brown-text"><img src="img/organic.png" class="responsive-img circle" width="125" height="125"></h2>
		    <h5 class="center">100% All Organic</h5>

		    <p class="light">We Promote Using Organic and Environmental Friendly Products. All Our Products Are Made 100% From Organic Substances.</p>
		  </div>
	</div>

	<div class="col s12 m4">
		  <div class="icon-block">
		    <h2 class="center brown-text"><img src="img/free-delivery.png" class="responsive-img circle" width="125" height="125"></h2>
		    <h5 class="center">Free Shipping</h5>

		    <p class="light">Buy a Minimum Required Amount From All Our Products and Receive Free Shipping. Only to People Residing Philippines.</p>
		  </div>
	</div>

	<div class="col s12 m4">
		  <div class="icon-block">
		    <h2 class="center brown-text"><img src="img/reseller.png" class="responsive-img circle" width="125" height="125"></h2>
		    <h5 class="center">Resellers Program</h5>

		    <p class="light">Want to Resell Our Products and Sell Online? Join Our Affiliate Program and Start Earning From Your Online Presence.</p>
		  </div>
	</div>

</div>
<!--Paginated Products-->
@include('layouts.loading')
<div class="productAjax buttonloader">                
@include('layouts.products')       
</div>

<!-- Make this Load Dynamically or Update Dynamically -->


<!-- Courrier List -->
@include('layouts.carousel')
</main>
@endsection

@section('footer')
{!! Html::script('js/cart.js') !!}
@include('layouts.pagination')
<!--Import Custom JS-->
@include('layouts.logoslider')
<script type="text/javascript">
jssor_1_slider_init();

       
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
    // Prevent Pressing Enter on Qty Input
    $('form input .qty_input').on('keypress', function(e) {
    return e.which !== 13;
    });

  function addProduct(id, e){
    e.preventDefault();
    var url = $('#form'+ id).attr('action');
    var formdata = $('#form' + id).serializeArray();
    buttonloader('on');
        $.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
        }).done(function(data){
            $('#qty'+id).val('1');
            $('#myCart').empty();
            $('#myCart').html(data);
            Materialize.toast('Product Added!', 4000,'',function(){console.log('Product Added!');});
            buttonloader('off');
        }).fail(function () { // if Fail
    Materialize.toast('Product Not Added!', 4000,'',function(){console.log('Product Not Found!');});
            buttonloader('off');
          });
    }
    function updateProduct(id){
    var url = $('#updateItemForm' + id).attr('action');
    var updatedata = $('#updateItemForm' + id).serializeArray();
        $.ajax({
            url: url,
            dataType:'JSON',
            data: updatedata,
            type:'post',
        }).done(function(data){
            $('#updateQty'+id).val();
            $('#myCart').empty();
            $('#myCart').html(data);
            Materialize.toast('Product Updated!', 4000,'',function(){console.log('Product Added!');});
        }).fail(function () { // if Fail
    Materialize.toast('Product Not Updated!', 4000,'',function(){console.log('Product Not Found!');});
          });
    }
    function removeCart(){
      var destroydata = $('#destroyCart').serializeArray();
      $.ajax({
            url: 'destroyCart',
            type:'post',
            dataType: 'JSON',
            data: destroydata,

        }).done(function(data){
            $('#myCart').empty();
            $('#myCart').html(data);
            Materialize.toast('Cart Removed!', 4000,'',function(){console.log('Cart Removed!');});
        }).fail(function () { // if Fail
    Materialize.toast('Cart Deletion Failed', 4000,'',function(){console.log('Cart Deletion Failed!');});
          });
    }

    function removeProduct(id){
      var itemData = $('#removeItemForm'+id).serializeArray();
      var url = $('#removeItemForm'+id).attr('action');
      $.ajax({
            url: url,
            type:'post',
            dataType: 'JSON',
            data: itemData,

        }).done(function(data){
            $('#myCart').empty();
            $('#myCart').html(data);
            Materialize.toast('Product Removed!', 4000,'',function(){console.log('Cart Removed!');});
        }).fail(function () { // if Fail
    Materialize.toast('Product Deletion Failed', 4000,'',function(){console.log('Cart Deletion Failed!');});
          });
    }
           

   
</script>
@endsection