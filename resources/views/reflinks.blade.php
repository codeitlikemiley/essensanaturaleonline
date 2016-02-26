<!DOCTYPE html>
  <html>
    <!--Import Header-->
    @include('layouts.header')
    <!--Custom Per Page Header-->
    @yield('head')
    <body>
    <!--Import Navbar-->
    @include('link.navbar')
    <!--Import Search Bar-->
    @include('layouts.search')

    <!--Your Content Here -->
    
    @yield('content')
   

    <!--Import Footer-->
    @include('layouts.footer')

    @include('layouts.btmsheet')

    @include('layouts.navbutton')

     <!--Import all JS Usable in All Page-->
     <script async src="/js/vendor.js"></script>
     <script>
(function() {
    var link = document.createElement('link');
    link.rel = "stylesheet";
    link.href = "https://fonts.googleapis.com/icon?family=Material+Icons";
    document.querySelector("head").appendChild(link);
})();
</script>
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
      loadCss('/css/vendor.css');
    </script>
    <noscript>
      <!-- Let's not assume anything -->
      <link rel="stylesheet" href="/css/vendor.css">
    </noscript>
     <script async src="js/search.js"></script>
    <!--Import Initialize Js Components-->
    @include('layouts.jquery')
    @include('layouts.cartAjax')

    <!--Custom JS Here!-->
    


    <!--Custom Script On Desired Page -->
    @yield('footer')
    

    </body>
   
    
  </html>
