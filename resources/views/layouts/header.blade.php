<head>
  <!-- meta tag  -->
  <script>
    !function(e){"use strict"
    var n=function(n,t,o){function i(e){return f.body?e():void setTimeout(function(){i(e)})}var d,r,a,l,f=e.document,s=f.createElement("link"),u=o||"all"
    return t?d=t:(r=(f.body||f.getElementsByTagName("head")[0]).childNodes,d=r[r.length-1]),a=f.styleSheets,s.rel="stylesheet",s.href=n,s.media="only x",i(function(){d.parentNode.insertBefore(s,t?d:d.nextSibling)}),l=function(e){for(var n=s.href,t=a.length;t--;)if(a[t].href===n)return e()
    setTimeout(function(){l(e)})},s.addEventListener&&s.addEventListener("load",function(){this.media=u}),s.onloadcssdefined=l,l(function(){s.media!==u&&(s.media=u)}),s}
    "undefined"!=typeof exports?exports.loadCSS=n:e.loadCSS=n}("undefined"!=typeof global?global:this)
  </script>
  <script type="text/javascript">

// Add a script element as a child of the body
 function downloadJSAtOnload() {
 var element = document.createElement("script");
 element.src = "js/vendor.js";
 document.body.appendChild(element);
 }

 // Check for browser support of event handling capability
 if (window.addEventListener)
 window.addEventListener("load", downloadJSAtOnload, false);
 else if (window.attachEvent)
 window.attachEvent("onload", downloadJSAtOnload);
 else window.onload = downloadJSAtOnload;

</script>
  @include('css.critical_ref')

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="csrf-token" content={{ csrf_token() }}/>
  
  <!-- Facebook Open Graph  -->
  <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Essensa Naturale Online" />
    <meta property="og:description"   content="Online Shop for Buah Merah and Other Organic Products of Essensa Naturale Inc." />
    <meta property="og:image"         content="{{ asset('img/buahmerah-1.png') }}" />

  <!-- Title Tag  -->
  <title>Essensa Naturale Online</title>
  
      <script>
    loadCSS("/css/vendor.css");
    </script>


</head>
