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
<!-- Start Custom Footer (JS) -->
@include('layouts.forms.fb-sdk')
<!-- End Custom Footer (JS) -->
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

'use strict';
function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
r(function(){
    if (!document.getElementsByClassName) {
        // IE8 support
        var getElementsByClassName = function(node, classname) {
            var a = [];
            var re = new RegExp('(^| )'+classname+'( |$)');
            var els = node.getElementsByTagName("*");
            for(var i=0,j=els.length; i<j; i++)
                if(re.test(els[i].className))a.push(els[i]);
            return a;
        }
        var videos = getElementsByClassName(document.body,"youtube");
    } else {
        var videos = document.getElementsByClassName("youtube");
    }

    var nb_videos = videos.length;
    for (var i=0; i<nb_videos; i++) {
        // Based on the YouTube ID, we can easily find the thumbnail image
        videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/sddefault.jpg)';

        // Overlay the Play icon to make it look like a video player
        var play = document.createElement("div");
        play.setAttribute("class","play");
        videos[i].appendChild(play);

        videos[i].onclick = function() {
            // Create an iFrame with autoplay set to true
            var iframe = document.createElement("iframe");
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
            if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
            iframe.setAttribute("src",iframe_url);
            iframe.setAttribute("frameborder",'0');

            // The height and width of the iFrame should be the same as parent
            iframe.style.width  = this.style.width;
            iframe.style.height = this.style.height;

            // Replace the YouTube thumbnail with YouTube Player
            this.parentNode.replaceChild(iframe, this);
        }
    }
});


</script>
@stop
