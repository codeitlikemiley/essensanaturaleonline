<head>
  <!-- meta tag  -->
   {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="csrf-token" content={{ csrf_token() }}/>
  <!-- Facebook Open Graph  -->
  <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Essena Naturale Online" />
    <meta property="og:description"   content="Official Seller of Buah Merah Juice Drink" />
    <meta property="og:image"         content="{{ asset('img/buah-merah.jpg') }}" />

  <!-- Title Tag  -->
  <title>Essensa Naturale Online</title>

   <!--Import all Css-->   
  {!! Html::style('css/vendor.css') !!}
  {!! Html::style('css/custom.css') !!}
  
  


</head>
