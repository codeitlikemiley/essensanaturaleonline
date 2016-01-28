{{-- Start Card Div --}}

<div class="card">
{{-- Login Form --}}
<form action="profile" method="POST" class="col s12 login-form" id="updateProfile" data-parsley-validate>

   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

   {{--*/ $user = \Auth::user() /*--}}
   
  <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">phone</i>
        <input id="mobile_no" type="text" name="contact_no" tabindex="2" required="" data-parsley-required-message="How Can We Contact You?" data-parsley-pattern="/(^0|[89]\d{2}-\d{3}\-?\d{4}$)|(^0|[89]\d{2}\d{3}\d{4}$)|(^63[89]\d{2}-\d{3}-\d{4}$)|(^63[89]\d{2}\d{3}\d{4}$)|(^[+]63[89]\d{2}\d{3}\d{4}$)|(^[+]63[89]\d{2}-\d{3}-\d{4}$)/i" data-parsley-pattern-message="Phone No. Invalid Format" data-parsley-trigger="change focusout"
        @if($user->profile->contact_no)
        value="{{ $user->profile->contact_no }}"
        @endif
        />
          <label for="mobile_no">Mobile No.</label>
        </div>
        <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">explore</i>
          <input id="address" type="text" name="address" tabindex="3" required="" data-parsley-required-message="We Need Your Address For Shipping!" data-parsley-trigger="change focusout"
          @if($user->profile->address)
          value="{{ $user->profile->address }}"
          @endif
          />
          <label for="address">Address</label>
        </div>
        <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">location_city</i>
          <input id="city" type="text" name="city" tabindex="3" required="" data-parsley-required-message="What is Your City?" data-parsley-trigger="change focusout"
          @if($user->profile->city)
          value ="{{ $user->profile->city }}"
          @endif
          />
          <label for="city">City</label>
        </div>
        <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">terrain</i>
          <input id="province" type="text" name="province_state" tabindex="3" required="" data-parsley-required-message="What is Your Province?" data-parsley-trigger="change focusout"
          @if($user->profile->province_state)
          value="{{ $user->profile->province_state }}"
          @endif
          />
          <label for="province">Province</label>
        </div>
        <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">map</i>
          <input id="zip_code" type="text" name="zip_code" tabindex="3" required="" data-parsley-required-message="What is Your Zip Code?" data-parsley-trigger="change focusout"
          @if($user->profile->zip_code)
          value="{{ $user->profile->zip_code }}"
          @endif
          />
          <label for="zip_code">Zip Code</label>
        </div>
        <div class="input-field col s11">
        <i class="material-icons prefix icon-lower">public</i>
          <input id="country" type="text" name="country" tabindex="3" required="" data-parsley-required-message="What is Your Country?" data-parsley-trigger="change focusout"
          @if($user->profile->country)
          value="{{ $user->profile->country }}"
          @endif
          />
          <label for="country">Country</label>
        </div>


  @include('layouts.loading')
  <div class="row buttonloader">
  <button class="col s5 offset-s1 btn waves-effect waves-light form-submit" type="submit" id="updateprofileBTN" name="action">Update Profile <i class="material-icons right">send</i></button>
  @if(Cart::count())
    <a href="/checkout" class="activator col s5 btn waves-effect waves-light deep-orange darken-4" type="submit" name="action" >Checkout</a>
    @else
    <a href="/" class="activator col s5 btn waves-effect waves-light amber" type="submit" name="action" >Order Products</a>
  @endif

  </div>
</form>
{{-- End Login Form --}}
  
</div>
{{-- End Card --}}
