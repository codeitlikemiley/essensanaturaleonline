<head>
  <!-- meta tag  -->
  <script>
var cb = function() {
  var sheets = [
    'css/vendor.css'];
  
  var h = document.getElementsByTagName('head')[0]; 

  for (var i = 0; i < sheets.length; i++) {
    var l = document.createElement('link'); 
    l.rel = 'stylesheet';
    l.type = 'text/css';
    l.href = sheets[i];
    l.media = 'screen,projection'
    //h.parentNode.insertBefore(l, h); // This would insert them before the head.
    h.appendChild(l); // Insert them inside the head.
  }  
};

var raf = requestAnimationFrame || mozRequestAnimationFrame ||
webkitRequestAnimationFrame || msRequestAnimationFrame;
if (raf) raf(cb);
else window.addEventListener('load', cb);
</script>
<style>
    @font-face {
     font-family: 'Material Icons';
     font-style: normal;
    font-weight: 400;
     src: local('Material Icons'), url('../font/material-design-icons/Material-Design-Icons.woff2') format('woff2');
   }
   .material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
  </style>

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
  
  


</head>
