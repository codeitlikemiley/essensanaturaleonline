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
<!--   Product Section   -->
<!--   Toggle and Load Product   -->
<div class="row container">
<div class="col s12 m4 l4">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="img/buah-merah.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Product Name<i class="material-icons right">live_help</i></span>
      <p><a href="#!">₱350<span><i class="material-icons right">add_shopping_cart</i></span></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Product Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
</div><div class="col s12 m4 l4">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="img/buah-merah.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Product Name<i class="material-icons right">live_help</i></span>
      <p><a href="#!">₱350<span><i class="material-icons right">add_shopping_cart</i></span></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Product Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
</div>
<div class="col s12 m4 l4">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="img/buah-merah.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Product Name<i class="material-icons right">live_help</i></span>
      <p><a href="#!">₱350<span><i class="material-icons right">add_shopping_cart</i></span></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
</div>
</div>
<!--Paginated Products-->
<div class="row">
<ul class="pagination center">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
</div>
<!-- Courrier List -->
@include('layouts.carousel')
</main>
@endsection

@section('footer')
<!--Import Custom JS-->
@include('layouts.logoslider')
<script>
jssor_1_slider_init();
</script>
@endsection