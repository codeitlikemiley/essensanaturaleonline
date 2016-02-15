@extends('app')

@section('head')
    {!! Html::style('css/parsley.css') !!}
@stop

@section('content')
<div class="container">

    <div class="section">
        <div class="row">
            <div class="col l6 offset-l3 m8 offset-m2 s12 ">

                <ul class="tabs z-depth-1">

                    <li class="tab col s3">
                        <a class="{{ Session::get('shipping-address') }}" href="#shipping-address">Shipping Details</a>
                    </li>
                </ul>
                <div class="progress" id="profileloader" style="display:none">
                    <div class="indeterminate amber" ></div>
                </div>
            </div>

            <div id="login" class="col l6 offset-l3 m8 offset-m2 s12 ">
                @include('layouts.forms.edit_profile')
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('footer')
<!--Import Google Recaptcha-->
    {!! Html::script('js/parsley.min.js') !!}
<script>
$.ajaxSetup({headers:{'X-CSRF-TOKEN':
    $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
$('#updateProfile').parsley();
function loader( v ) {
if (v == 'on') {

    $('#profileloader').show();
}
else {

    $('#profileloader').hide();
}
}
function buttonloader(v)
{

if(v == 'on'){

 $('.input-field').css({opacity : 0.2});
 $('.buttonloader').hide();
 $('.loading').show();

}
else{
 $('.input-field').css({opacity : 1});
 $('.loading').hide();
 $('.buttonloader').show();

}
}
$('#updateProfile').on('submit', function (e){
            // PREVENT SUBMIT
            e.preventDefault();

            var form = $(this);
            // Validate The Form
            form.parsley().validate();
            if (form.parsley().isValid()){
                var profile_form = form.serializeArray();
                var url = form.attr('action');
                loader('on');
                buttonloader('on');
                
            // Start AJAX CALL
            $.ajax( {
                url: url,
                type: 'POST',
                dataType: 'json',
                data: profile_form,
                success: function (data) {
                    loader('off');
                    buttonloader('off');

                    Materialize.toast(data.message, 4000,'',function () {
                                //
                            });
                },
                error: function (data) {
                    loader('off');
                    buttonloader('off');
                    var errors = data.responseJSON;
                    $.each( errors.errors, function (index, error) {
                        Materialize.toast(error, 4000, '',function () {
                                //
                            });
                    });

                }
            }); // End Login Ajax Call
        }  // End PARSLEY isValid

});
//END LOGIN SUBMIT
</script>
    
    
@stop
