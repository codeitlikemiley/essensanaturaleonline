<form action="postCheckOut" method="POST" class="col s12 login-form" id="postCheckOut">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<h6>How do You Want to Receive the Product?</h6>
@foreach ($method as $value) 
    <p>
      <input class="with-gap" name="method" type="radio" id="{{ $value }}"/>
      <label for="{{ $value }}">{{ $value }}</label>
    </p>
@endforeach 

<div class="input-field col s12">
    <select name="mop">
      <option value="" disabled selected>Select Mode Of Payment</option>
  	@foreach ($mop as $key => $value) 
      <option value="{{ $key }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Mode of Payment</label>
</div>
  
<!-- If $key is selected toggle this Using Jquery -->
{{-- <div class="input-field col s12">
    <select name="name">
      <option value="" disabled selected>Select A Bank</option>
  	@foreach ($bank_name as $key => $value) 
      <option value="{{ $value }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Bank Deposit</label>
</div> --}}

{{-- 
<div class="input-field col s12">
    <select name="name">
      <option value="" disabled selected>Select A Bank</option>
  	@foreach ($online_bank_name as $key => $value) 
      <option value="{{ $value }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Online Bank Transfer</label>
</div> --}}

{{-- <div class="input-field col s12">
    <select name="name">
      <option value="" disabled selected>Select Mobile Carrier</option>
  	@foreach ($mobile_carrier as $key => $value) 
      <option value="{{ $value }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Mobile Transfer</label>
</div> --}}

<div class="input-field col s12">
    <select name="name">
      <option value="" disabled selected>Select Remittance</option>
  	@foreach ($remittance_name as $key => $value) 
      <option value="{{ $value }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>Remittances</label>
</div>
@include('layouts.loading')

   <div class="row buttonloader">

    <button class="col s6 offset-s3 btn waves-effect waves-light form-submit" type="submit" name="action" id="checkOutBtn">Place Order</button>
    </div>
</form>