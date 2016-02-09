@extends('app')

@section('head')
<!-- Start Custom Header (CSS) -->

<!-- End Custom Header (CSS) -->
@stop

@section('content')
<!-- START Main Content -->
<main>
    <div class="section">
	    <div class="row">
	    <div class="col l6 offset-l3 m8 offset-m2 s12">
	    	<div class="col s12 login-form"><h3 class="amber-text center">Member's Account Profile</h3>
	    	</div>
			{!! Form::model($data, 
					[
						'route'=> 'update-profile', 
						'class' => 'col s12 login-form', 
					]) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				<div class="row z-depth-2 center">
				<h6 class="teal-text tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Your Private Info Here Will Not Be Shared Publicly Except For Your Display Name"
				>Personal Info/Shipping Details</h6>
				
				<div class="input-field col s12 l6 m6">
				    <i class="material-icons prefix icon-lower">perm_identity</i>
				    {!! Form::text('first_name', null ,['placeholder' => 'First Name', 'id' => 'first_name', 'disabled' => '']) !!}
				    {!! Form::label('first_name', 'First Name', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6">
				    <i class="material-icons prefix icon-lower">supervisor_account</i>
				    {!! Form::text('last_name', null ,['placeholder' => 'Last Name', 'id' => 'last_name', 'disabled' => 'disabled']) !!}
				     {!! Form::label('last_name', 'Last Name', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6 tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Changing this Will Change Your E-Shop Name">
				    <i class="material-icons prefix icon-lower">public</i>
				    {!! Form::text('display_name',null ,['placeholder' => 'Display Name', 'id' => 'display_name']) !!}
				    {!! Form::label('display_name', 'Display Name', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6 tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Your Personal Phone No. This is Private and Not Shared Online">
				    <i class="material-icons prefix icon-lower">phone</i>
				    {!! Form::text('contact_no',null ,['placeholder' => 'Contact No.' , 'id' => 'contact_no']) !!}
				    {!! Form::label('contact_no', 'Contact No.', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12">
				    <i class="material-icons prefix icon-lower">my_location</i>
				    {!! Form::text('address',null ,['placeholder' => 'Address', 'id' => 'address']) !!}
				    {!! Form::label('address', 'Address', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6">
				    <i class="material-icons prefix icon-lower">business</i>
				    {!! Form::text('city',null ,['placeholder' => 'City' , 'id' => 'city']) !!}
				    {!! Form::label('city', 'City', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6">
				    <i class="material-icons prefix icon-lower">landscape</i>
				    {!! Form::text('province_state',null ,['placeholder' => 'Province/State', 'id' => 'province_state']) !!}
				    {!! Form::label('province_state', 'Province / State', array('class' => 'awesome')); !!}

				</div>
				<div class="input-field col s12 l6 m6">
				    <i class="material-icons prefix icon-lower">location_on</i>
				    {!! Form::text('zip_code',null ,['placeholder' => 'Zip Code', 'id' => 'zip_code']) !!}
				    {!! Form::label('zip_code', 'Zip Code', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l6 m6 tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Note: People Residing Outside Philippines have Variety of Shipment Fee. See Our List of Shipment Fee in FAQ Section">
				    <i class="material-icons prefix icon-lower">assistant_photo</i>
				    {!! Form::text('country',null ,['placeholder' => 'Country', 'id' => 'country']) !!}
				    {!! Form::label('country', 'Country', array('class' => 'awesome')); !!}
				</div>
				</div>
				<div class="row z-depth-2 center tooltipped" 
				data-position="top" data-delay="50" data-tooltip="If You Want Your Customer to Reach You in Your Social Media Account. You Can Add It Here.">
				<h6 class="teal-text">Social Medial Account Links</h6>
				
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">link</i>
				    {!! Form::text("social_links[facebook]",null ,['placeholder' => 'username', 'id' => "social_links[facebook]"]) !!}
				    {!! Form::label("social_links[facebook]", 'Facebook', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">link</i>
				    {!! Form::text("social_links[twitter]",null ,['placeholder' => '@username', 'id' => "social_links[twitter]"]) !!}
				    {!! Form::label("social_links[twitter]", 'Twitter', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">link</i>
				    {!! Form::text("social_links[instagram]",null ,['placeholder' => 'username', 'id' => "social_links[instagram]"]) !!}
				    {!! Form::label("social_links[instagram]", 'Instagram', array('class' => 'awesome')); !!}
				</div>
				</div>
				<div class="row z-depth-2 center tooltipped" 
				data-position="top" data-delay="50" data-tooltip="How Can Your Customer Reach You Thru Phone? All Info Here Will Be Displayed Publicly unlike Your Personal Contact No. Above">
				<h6 class="teal-text">Business Phone No.</h6>
				
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">local_phone</i>
				    {!! Form::text("contact_options[globe]",null ,['placeholder' => 'Globe No.', 'id' => "contact_options[globe]"]) !!}
				    {!! Form::label("contact_options[globe]", 'Globe', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">local_phone</i>
				    {!! Form::text("contact_options[smart]",null ,['placeholder' => 'Smart No.', 'id' => "contact_options[smart]"]) !!}
				    {!! Form::label("contact_options[smart]", 'Smart', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">local_phone</i>
				    {!! Form::text("contact_options[sun]",null ,['placeholder' => 'Sun No.', 'id' => "contact_options[sun]"]) !!}
				    {!! Form::label("contact_options[sun]", 'Sun', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">local_phone</i>
				    {!! Form::text("contact_options[tm]",null ,['placeholder' => 'Touch Mobile No.', 'id' => "contact_options[tm]"]) !!}
				    {!! Form::label("contact_options[tm]", 'Touch Mobile', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">phone_iphone</i>
				    {!! Form::text("contact_options[viber]",null ,['placeholder' => 'Viber No.', 'id' => "contact_options[viber]"]) !!}
				    {!! Form::label("contact_options[viber]", 'Viber', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s12 l4 m4">
				    <i class="material-icons prefix icon-lower">phone_iphone</i>
				    {!! Form::text("contact_options[skype]",null ,['placeholder' => 'Skype Account', 'id' => "contact_options[skype]"]) !!}
				    {!! Form::label("contact_options[skype]", 'Skype', array('class' => 'awesome')); !!}
				</div>
				</div>
				<div class="row">
			    <button class="col s6 offset-s3 btn waves-effect waves-light form-submit z-depth-2"
			         type="submit" name="action">Update</button>
		         </div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

</main>
<!-- END Main Content -->
@stop

@section('footer')
<!-- Start Custom Footer (JS) -->

<!-- End Custom Footer (JS) -->
@stop
