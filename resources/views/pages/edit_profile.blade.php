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

	    	<div class="col s12 login-form">

	    	<div class="col s12">
	    	<h5 class="amber-text center">My Profile</h5>
	    	</div>
	    	<div class="col s12 m4 l4">
	    	<div id="picture_wrapper">
	    	<div id="profile_picture" class="center">
	    	<img src="{{ $data['profile_pic'] }}" alt="myprofilepic" class="responsive-img" width="150px" height="150px" style="border-radius: 150px">
	    	</div>
	    	<button href="#viewModalPic{{ $data['id'] }}" class="modal-trigger modal-profile-pic col s12 btn waves-effect waves-light form-submit left z-depth-0 tooltipped" data-position="top" data-delay="50" data-tooltip="Upload Profile Pic" type="btn" style="margin-bottom: 25px; magin-top: 25px;">Upload Photo</button>
	    	</div>
  			<div id="viewModalPic{{ $data['id'] }}" class="modal">
  			<form action="updateProfilePic" method="POST" id="postProfilePic{{ $data['id'] }}" enctype="multipart/form-data" onsubmit="submitProfilePic({{ $data['id'] }}); return false;">
    		<div class="modal-content">


	        <blockquote class="center">
	          <h5>Profile Pic</h5>
	        </blockquote>
	          <div class="row">
	          <div class ="col s12">
	           
			   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				  <input type="hidden" name="id" value="{{ $data['id'] }}"/>
			      <div class="file-field input-field">
				      <div class="btn">
				        <span>Image</span>
				        <input type="file" name="attachment"
				        @if($data['profile_pic'])
				         value="{{ $data['profile_pic'] }}"
				        @endif
				        >
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text"
						@if($data['profile_pic'])
				         value="{{ $data['profile_pic'] }}"
				        @endif
				        >
			      	  </div>
	    		  </div>
    		   
    		

	          </div>
	          </div>
	    
        
 			</div>
 			<div class="modal-footer modal-fixed-footer">
    		   <button class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat" type="submit" name="action" >Upload</button>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    		</div>
    </form>
  </div>

	    	</div>
	    	<div class="col s12 m8 l8">
	    	
		    <form class="col s12" action="updateAboutMe" method="POST" id="updateAboutMe" onchange="updateAboutMe(); return false;">
		      <div class="row">
		      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		        <div class="input-field">
		          <i class="material-icons prefix">mode_edit</i>
		          <textarea id="icon_prefix2" name="about_me" class="materialize-textarea tooltipped" data-position="top" data-delay="50" data-tooltip="Profile About Me Will Be Updated Automatically!">{{ $data['about_me'] }}</textarea>
		          <label for="icon_prefix2">About Me</label>
		        </div>
		      </div>
		     
		    </form>

	    	</div>
	    	
        
	    	</div>
			{!! Form::model($data, 
					[
						'route'=> 'update-profile', 
						'class' => 'col s12', 
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
				data-position="top" data-delay="50" data-tooltip="Add Here Your Team Facebook Group Link">
				<h6 class="teal-text">Your Team's Fb Group Link</h6>
				<div class="input-field col s12">
				    <i class="material-icons prefix icon-lower">link</i>
				    {!! Form::url("social_links[fb-groups]",null ,['placeholder' => 'https://www.facebook.com/groups/grouplink', 'id' => "social_links[fb-groups]"]) !!}
				    {!! Form::label("social_links[fb-groups]", 'Facebook Group', array('class' => 'awesome')); !!}
				</div>	
				</div>
				<div class="row z-depth-2 center tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Type Here Your Facebook Fan Page Link">
				<h6 class="teal-text">Your FB Fan Page</h6>
				<div class="input-field col s12">
				    <i class="material-icons prefix icon-lower">link</i>
				    {!! Form::url("social_links[fb-fanpage]",null ,['placeholder' => 'https://www.facebook.com/FANPAGELINK', 'id' => "social_links[fb-fanpage]"]) !!}
				    {!! Form::label("social_links[fb-fanpage]", 'Facebook Fan Page', array('class' => 'awesome')); !!}
				</div>	
				</div>
				<div class="row z-depth-2 center tooltipped" 
				data-position="top" data-delay="50" data-tooltip="Fill This Up if You Want to Receive Message in Your FB Fanpage">
				<h6 class="teal-text">FB Apps API</h6>
				<div class="input-field col s6">
				    <i class="material-icons prefix icon-lower">fingerprint</i>
				    {!! Form::text("social_links[app_id]",null ,['placeholder' => 'YOUR FB APP ID', 'id' => "social_links[fb-fanpage]"]) !!}
				    {!! Form::label("social_links[fb-app_id]", 'App ID', array('class' => 'awesome')); !!}
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix icon-lower">vpn_lock</i>
				    {!! Form::text("social_links[app_secret]",null ,['placeholder' => 'Dont Share This With Anyone', 'id' => "social_links[app_secret]"]) !!}
				    {!! Form::label("social_links[app_secret]", 'SECRET KEY', array('class' => 'awesome')); !!}
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
<script>
$.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
$('.modal-profile-pic').leanModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: '.6', // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { console.log('Open'); }, // Callback for Modal open
                complete: function() { console.log('Closed'); } // Callback for Modal close
                });

function submitProfilePic(id){
    var url = $('#postProfilePic'+ id).attr('action');
    var form = document.querySelector('#postProfilePic'+ id);
    var formdata = new FormData(form);
        $.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
            processData: false,
            contentType: false,
        }).done(function(data){
           $('#profile_picture').empty();
           $('#profile_picture').html(data.html);
           Materialize.toast(data.message, 4000,'',function () {
            // console.log(data);
           });

        }).fail(function () { // if Fail
            var errors = data.responseJSON;

            $.each(errors.message, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){
                //
            });
            });
            
          });
    }
    function updateAboutMe(){
    var url = $('#updateAboutMe').attr('action');
    var aboutMeForm = $('#updateAboutMe').serializeArray();
        $.ajax({
            url: url,
            dataType:'JSON',
            data: aboutMeForm,
            type:'post',
        }).done(function(data){
            
           Materialize.toast(data.message, 4000,'',function () {
            console.log(data);
           });

        }).fail(function () { // if Fail
            var errors = data.responseJSON;

            $.each(errors.message, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){
                //
            });
            });
            
          });
    }
</script>

<!-- End Custom Footer (JS) -->
@stop
