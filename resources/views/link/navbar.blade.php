<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      {{-- NavBar Logo Section --}}
      <a id="logo-container" href="#" class="brand-logo fixed hide-on-small-only"
      style="text-align: right; margin-left: 50px;"
      >
      @if($link)
      <h6 style="margin-top: 15px; font-size: 25px;">{{ $link->user->profile->display_name.'\'s Buah Merah Mix Online Shop' }} 
      <span style="font-size:15px; margin-top:20px; color:#e8eaf6;">
      @include('link.navbartop-contact')
      </span>
      </h6>
      @endif
      </a>


      
      {{-- SideBar Section Start Here! --}}
      <ul id="slide-out" class="side-nav teal lighten-5">

        {{-- Company Legalities and Location Section --}}
        <div class="card teal lighten-5" style="height:250px">
              {{-- Company Logo --}}
              {{--*/ $name = $link->user->profile->first_name.' '.$link->user->profile->last_name /*--}}
              <div class="card-image waves-effect waves-block waves-light">
                  <img src=
                  "
                  {{-- @if($link->user->profile->profile_pic)
                  {{ $link->user->profile->profile_pic }}
                  @else --}}
                  {{ Avatar::create($name)->toBase64() }}
                  {{-- @endif --}}
                  " class="circle responsive-img" style="height:150px; width:150px; margin-left: 60px; border-radius: 75px; background-color: #ef9a9a;">
              </div>

              {{-- Company Finder Button --}}
              <div class="card-content">
                  <p class="teal-text center" style="margin-top: -30px;">{{ $link->user->profile->first_name.' '.$link->user->profile->last_name }}</p>
                  <p class="card-title activator teal-text">Main Office<i class="material-icons left" style="margin-left: 10px; margin-top: -10px;">map</i></p>

              </div>

              {{-- Google Map --}}
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Main Office<i class="material-icons left">close</i></span>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=zkYyseM1DRiQ.kLrjC08br2XU" width="220" height="150"></iframe>
              </div>
        </div>


        {{-- Side Bar Nav Menu --}}
        <li><a href="#company profile" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">business</i>Company Profile</a></li>
        <li><a href="http://iregister.sec.gov.ph/MainServlet?param=search" class="waves-effect waves-light waves-red lighten-5 teal-text" target="_blank"><i class="material-icons left">verified_user</i>Verify SEC</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">description</i>Legalities</a></li>
        <li class="no-padding ">
            <ul class="collapsible collapsible-accordion ">
              <li>
                <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">contact_phone</i>Contact Me<i class="material-icons right" style="margin-right: -22px;">keyboard_arrow_down</i></a>
                <div class="collapsible-body">
                <!-- Options (json) -->
                  <ul class="teal lighten-5">
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Globe: {{ $link->user->profile->contact_no }}</a></li>
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Smart: {{ $link->user->profile->contact_no }}</a></li>
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Sun :{{ $link->user->profile->contact_no }}</a></li>
                  </ul>
                </div>
              </li>
            </ul>
        </li>

        <li class="no-padding ">
            <ul class="collapsible collapsible-accordion ">
              <li>
                <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">public</i>
                <span style="font-size: 13.2px;">Social Media Accounts</span><i class="material-icons right" style="margin-right: -22px;">keyboard_arrow_down</i></a>
                <div class="collapsible-body">
                <!-- Options (json) -->
                  <ul class="teal lighten-5">
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Facebook: {{ $link->user->profile->contact_no }}</a></li>
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Twitter: {{ $link->user->profile->contact_no }}</a></li>
                    <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Instagram :{{ $link->user->profile->contact_no }}</a></li>
                  </ul>
                </div>
              </li>
            </ul>
        </li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">accessibility</i>Testimonials</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">local_drink</i><span style="font-size: 12px;">Dosage Intake of Buah Merah</span></a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">speaker_notes</i>FAQ's Section</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">add_shopping_cart</i>How to Order?</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">local_shipping</i>Courrier List</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">ondemand_video</i>Business Presentation</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">theaters</i><span style="font-size: 13px">Powerpoint Presentation</span></a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">group_add</i>Join FB Group</a></li>
        <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">location_searching</i>Visit Nearest Center</a></li>

        <li class="no-padding ">
          <ul class="collapsible collapsible-accordion ">
            <li>
              <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">local_atm</i>Be A Reseller<i class="material-icons right" style="margin-right: -22px;">keyboard_arrow_down</i></a>
              <div class="collapsible-body">
                <ul class="teal lighten-5">
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Builder Package</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Starter Package</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Dealer Package</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Service Center Package</a></li>
                  <li><a href="#!" class="waves-effect waves-light waves-red lighten-5 teal-text">Business Depo Package</a></li>
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
