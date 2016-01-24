@extends('app')

@section('head')
<!--Import Custom Header-->
@endsection

@section('content')
<main>
<div class="container">

    <div class="section">
        <div class="row">
            <div class="col l6 offset-l3 m8 offset-m2 s12 ">

                <ul class="tabs z-depth-1">

                    <li class="tab col s3">
                        <a class="{{ Session::get('MOP') }}" href="#getCheckOut">Order Payment</a>
                    </li>
                </ul>
                <div class="progress" id="paymentloader" style="display:none">
                    <div class="indeterminate amber" ></div>
                </div>
            </div>

            <div id="checkoutform" class="col l6 offset-l3 m8 offset-m2 s12 ">
                @include('layouts.forms.checkout')
            </div>
            
        </div>
    </div>
</div>
</main>
@endsection

@section('footer')
<!--Import Footer -->
@endsection


