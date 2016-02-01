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
<script type="text/javascript">
function loader( v ) {
if (v == 'on') {

    $('#paymentloader').show();
}
else {

    $('#paymentloader').hide();
}
}

$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
    $(document).on('change','.loadPayment', function(e){
            
        var string = $(e.target).val();
        list = string.replace("App\\","");
        loader('on');
        getMOP(list);
    }); // Doc on change
    function getMOP(list){
        $.ajax({
                url: '/get' + list
            }).done(function(data){
                $('#mop_list').empty();
                $('#paymentdetails').empty();
                $('#mop_list').append(data);
                $('select').material_select('destroy');
                $('select').material_select();
                loader('off');
                 Materialize.toast('Payment Gateway Loaded!', 4000,'',function(){console.log('Payment Gateway Loaded!');});
                
            }).fail(function () {
            $('#mop_list').empty();
            $('#paymentdetails').empty();
            $('select').material_select('destroy');
            $('select').material_select();
            loader('off'); // if Fail
                Materialize.toast('Fail To Load Payment Gateway!', 4000,'',function(){console.log('Failed to Load Payment Gateway!');});
    });
    }
    $(document).on('change','.paymentDetails', function(e){
            
        var mop = $(e.target).val();
        mop = mop.replace(/\s/g,'');
        loader('on');
        getPaymentDetails(mop);
    });
    function getPaymentDetails(mop){
        $.ajax({
                url: '/load' + mop
            }).done(function(data){
                console.log(data);
                $('#paymentdetails').empty();
                $('#paymentdetails').html(data);
                loader('off');
                 Materialize.toast('Payment Details Loaded!', 4000,'',function(){console.log('Payment Details Loaded!');});
                
            }).fail(function () {
            $('#paymentdetails').empty();
            loader('off'); // if Fail
                Materialize.toast('Fail To Load Payment Details!', 4000,'',function(){console.log('Failed to Load Payment Details!');});
    });
    }
   
</script>
@endsection


