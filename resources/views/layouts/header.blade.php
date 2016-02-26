<head>
  <!-- meta tag  -->
  <style>
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url("../font/material-icons/Material-Design-Icons.eot"); /* For IE6-8 */
  src: local('Material Icons'),
       local('MaterialIcons-Regular'),
       url("../font/material-icons/Material-Design-Icons.woff2") format('woff2'),
       url("../font/material-icons/Material-Design-Icons.woff") format('woff'),
       url("../font/material-icons/Material-Design-Icons.ttf") format('truetype'),
       url("../font/material-icons/Material-Design-Icons.svg") format('svg');
}
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;  /* Preferred icon size */
  display: inline-block;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;

  /* Support for all WebKit browsers. */
  -webkit-font-smoothing: antialiased;
  /* Support for Safari and Chrome. */
  text-rendering: optimizeLegibility;

  /* Support for Firefox. */
  -moz-osx-font-smoothing: grayscale;

  /* Support for IE. */
  font-feature-settings: 'liga';
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

   <!--Import all Css-->   
  {!! Html::style('css/vendor.css') !!}
  
  


</head>
