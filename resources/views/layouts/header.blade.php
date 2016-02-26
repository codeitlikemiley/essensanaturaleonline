<head>
  <!-- meta tag  -->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/vendor.css"  media="screen,projection"/>
  <script>
      /*!
      loadCSS: load a CSS file asynchronously.
      */
      function loadCSS(href){
        var ss = window.document.createElement('link'),
            ref = window.document.getElementsByTagName('head')[0];

        ss.rel = 'stylesheet';
        ss.href = href;

        // temporarily, set media to something non-matching to ensure it'll
        // fetch without blocking render
        ss.media = 'only x';

        ref.parentNode.insertBefore(ss, ref);

        setTimeout( function(){
          // set media back to `all` so that the stylesheet applies once it loads
          ss.media = 'all';
        },0);
      }
      loadCss('css/vendor.css');
    </script>
    <noscript>
      <!-- Let's not assume anything -->
      <link rel="stylesheet" href="css/vendor.css">
    </noscript>
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
