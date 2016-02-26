<head>
  <!-- meta tag  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
