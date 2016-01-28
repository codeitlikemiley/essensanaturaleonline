<form action="checkout" method="POST" class="col s12 login-form" id="postCheckOut">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<h6>How do You Want to Receive the Product?</h6>
@foreach ($method as $value) 
    <p>
      <input class="with-gap" value="{{ $value }}" name="method" type="radio" id="{{ $value }}"/>
      <label for="{{ $value }}">{{ $value }}</label>
    </p>
@endforeach 

<div class="input-field col s12 loadPayment">
    <select name="mop">
      <option value="" disabled selected>Select Mode Of Payment</option>
  	@foreach ($mop as $key => $value) 
      <option value="{{ $key }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Mode of Payment</label>
</div>

<div id="mop_list">
    
</div>
<div class="row" id="paymentdetails">

{{-- @include('layouts.forms.paymentdetails') --}}
</div>

</form>