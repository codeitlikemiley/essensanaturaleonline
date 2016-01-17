<!DOCTYPE html>
  <html>
    <!--Import Header-->
    @include('layouts.header')
    <!--Custom Per Page Header-->
    @yield('head')
    <body>
    <!--Import Navbar-->
    @include('layouts.navbar')
    <!--Import Search Bar-->
    @include('layouts.search')
   <!--Import Page Loader-->
    @include('layouts.loader')

    <!--Your Content Here -->
    
    @yield('content')
   

    <!--Import Footer-->
    @include('layouts.footer')

    @include('layouts.navbutton')

    <!--Import all JS Usable in All Page-->
    {!! Html::script('js/vendor.js') !!}
    <!--Import Initialize Js Components-->
    @include('layouts.ajax')

    <!--Custom JS Here!-->
    {!! Html::script('js/search.js') !!}

    <!--Custom Script On Desired Page -->
    @yield('footer')

    </body>
    
  </html>
