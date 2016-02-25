@extends('reflinks')

@section('head')
<!-- Start Custom Header (CSS) -->
<meta property="fb:admins" content="{{ $link->user->facebook_user_id }}"/>
<meta property="fb:app_id" content="{{ $link->user->profile->social_links['app_id'] }}" />
<!-- End Custom Header (CSS) -->
@stop

@section('content')
<!-- START Main Content -->
<main>
  <div class="row">
    <div class="col l9 m9 s12">
      <ul class="tabs light-blue lighten-5 z-depth-2">
        <li class="tab col s3" style="min-width: 120px;"><a class="active" href="#tab1">Buah Merah</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab2">Company</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab3">Legalities</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab4">Awards</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab5">Testimonials</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab6">How To Drink</a></li>
        <li class="tab col s3" style="min-width: 120px;"><a href="#tab7">How To Order</a></li>
      </ul>
    </div>
    <div id="tab1" class="col l9 m9 s12"> 
    @include('link.buahmerah')
    </div>
    <div id="tab2" class="col l9 m9 s12">
    @include('link.company')
    </div>
    <div id="tab3" class="col l9 m9 s12">
    @include('link.legalities')
    </div>
    <div id="tab4" class="col l9 m9 s12">
    @include('link.awards')
    </div>
    <div id="tab5" class="col l9 m9 s12">
    @include('link.testimonials')
    </div>
    <div id="tab6" class="col l9 m9 s12">
    @include('link.howToDrink')
    </div>
    <div id="tab7" class="col l9 m9 s12">
    @include('link.howToOrder')
    </div>
    <div class="col l3 m3 s12 right">
    @include('layouts.loading')
    @include('layouts.forms.addToCartBuahMerah')
    @include('layouts.forms.contactMe')
    
    </div>
  </div>
    @include('link.fbcomment')
  
</main>
<!-- END Main Content -->
@stop

@section('footer')

<script>
$(document).ready(function(){
      $('.carousel').carousel();
    });

function viewcompany(){
$('ul.tabs').tabs('select_tab', 'tab2');

}
function viewlegalities(){
$('ul.tabs').tabs('select_tab', 'tab3');

}
function viewtestimonials(){
$('ul.tabs').tabs('select_tab', 'tab5');

}
function viewdosage(){
$('ul.tabs').tabs('select_tab', 'tab6');

}
function viewhowtoorder(){
$('ul.tabs').tabs('select_tab', 'tab7');

}
$(window).on('ajaxComplete', function() {
  setTimeout(function() {
    $(window).lazyLoadXT();
  }, 50);
});
</script>
@stop



