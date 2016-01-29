{{-- Navigation Floating Button --}}
  <div class="fixed-action-btn  click-to-toggle tooltipped" data-position="left" data-delay="0" data-tooltip="Click Here to Navigate To" style="bottom: 40px; right: 50px; z-index: 996;">
    <a class="btn-floating btn-large amber darken-2">
      <i class="material-icons">navigation</i>
    </a>
    <ul>
      
      @if(Cart::count())
      <li><a href="/checkout" class="btn-floating red darken-4"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Check Out">local_shipping</i></a></li>
      @else
      <li><a href="/checkout" id ="checkoutnavbtn" style="display: none;" class="btn-floating red darken-4"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Check Out">local_shipping</i></a></li>
      @endif
      <li><a href="#cartbtn" class="btn-floating yellow darken-1 modal-trigger" id="navbtnmodal"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Cart">shopping_cart</i></a></li>

      {{-- <li><a href="#!" class="btn-floating green"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Products">store</i></a></li> --}}
      

      <li><a href="/profile" class="btn-floating orange"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Dashboard">account_circle</i></a></li>

      <li><a href="/" class="btn-floating red lighten-1"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Home">home</i></a></li>

      <li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="btn-floating blue"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Share">share</i></a></li>

       
    </ul>
  </div>