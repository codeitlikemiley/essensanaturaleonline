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
        <img src="/img/city.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Want To Resell Our Products?</h3>
          <h5 class="light grey-text text-lighten-3">Be An Affiliate Now!</h5>
          <a href="/login" id="download-button" class="btn-large waves-effect waves-light teal lighten-1 center">Click Here To Sign Up!</a>
        </div>
        
          
        
      </li>
      <li>
        <img src="/img/parallax4.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>100% Natural and Organic</h3>
          <h5 class="light white-text">Choose Form Our Wide Variety of Natural and Organic Products!</h5>
        </div>
      </li>
      <li>
        <img src="/img/parallax3.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="teal-text">Save Lives</h3>
          <h5 class="light teal-text">Strengthen the Body Natural Immune System to Fight Diseases</h5>
        </div>
      </li>
      <li>
        <img src="/img/parallax6.png"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="teal-text">Shop Online</h3>
          <h5 class="light teal-text">100% Secure Shopping</h5>
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
{{-- {!! Html::script('js/cart.js') !!} --}}
@include('layouts.pagination')
<!--Import Custom JS-->
@include('layouts.logoslider')
<script type="text/javascript">
jssor_1_slider_init();
</script>
@endsection