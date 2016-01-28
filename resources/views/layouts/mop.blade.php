<div class="input-field col s12 paymentDetails">
    <select name="name">
      <option value="" disabled selected>Select from {{ $type }} List</option>
  	@foreach ($mop as $key => $value) 
      <option value="{{ $value }}">{{ $value }}</option>
	@endforeach
    </select>
    <label>{{ $option }}</label>
</div>