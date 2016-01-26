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
                        <a class="{{ Session::get('profile') }}" href="#login">Shipping Details</a>
                    </li>
                </ul>
                <div class="progress" id="loginloader" style="display:none">
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

    
    
@stop
