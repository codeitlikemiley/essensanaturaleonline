<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      {{-- NavBar Logo Section --}}
      <a id="logo-container" href="#" class="brand-logo center fixed hide-on-small-only">
      <h5>Essensa™</h5>
         {{-- <img src="img/logo.png" width="50" height="50" alt="Essensa Naturale Online"> --}}
      </a>


      {{-- SideBar Section Start Here! --}}
      <ul id="slide-out" class="side-nav teal lighten-5">

        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">work</i>About Us</a></li>

        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">email</i>Contact Us</a></li>

        <li class="no-padding ">
          <ul class="collapsible collapsible-accordion ">
            <li>
              <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">grade</i>Products<i class="material-icons right">keyboard_arrow_down</i></a>
              <div class="collapsible-body">
                <ul class="teal lighten-5">
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Eu De Cologne</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Eu De Toillete</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Facial Care</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Facial Care Package</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Fertilizer</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Food Supplements</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Household</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Personal Care</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Soap Bar</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
      {{-- Side Bar Ends Here --}}

      {{-- Side Bar Toggle Button --}}
      <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">view_headline</i></a>
      <ul class="right">
        <li id="searchable"><a href="#!"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here To Search Product!">search</i></a></li>

        <!-- MODAL TRIGGER INITIALIZE -->
        <li><a href="#cartbtn" id="nav-cart" class="modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here To View Order"><i class="material-icons">shopping_cart</i></a></li>
        @if(Cart::count())
        <li><a href="/checkout" id="nav-checkout" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here To Check Out"><i class="material-icons">local_shipping</i></a></li>
        @endif
        @if(!Auth::user())
        <li><a href="/profile" id="navbar-login" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here to Access Account"><i class="material-icons">account_circle</i></a></li>
        @endif
        @if(Auth::user())
        <li><a href="/orders" id="navbar-order" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here to View Orders"><i class="material-icons">assignment</i></a></li>
        <li><a href="/logout" id="navbar-logout" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Click Here to Log Out Account!"><i class="material-icons">settings_power</i></a></li>
        @endif
      </ul>

    </div>
  </nav>
</div>
