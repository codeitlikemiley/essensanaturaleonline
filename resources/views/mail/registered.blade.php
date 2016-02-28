<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Account Registration</title>

<style type="text/css">
   img {
    max-width: 100%;
   }
   body {
    -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6;
   }
   body {
     background-color: #f6f6f6;
   }
   @media only screen and (max-width: 640px) {
      h1 {
        font-weight: 600 !important; margin: 20px 0 5px !important;
      }
       h2 {
        font-weight: 600 !important; margin: 20px 0 5px !important;
       }
       h3 {
         font-weight: 600 !important; margin: 20px 0 5px !important;
       }
       h4 {
         font-weight: 600 !important; margin: 20px 0 5px !important;
         }
       h1 {
        font-size: 22px !important;
       }
       h2 {
         font-size: 18px !important;
       }
       h3 {
          font-size: 16px !important;
       }
      .container {
        width: 100% !important;
        }
      .content {
           padding: 10px !important;
       }
       .content-wrap {
             padding: 10px !important;
        }
        .invoice {
            width: 100% !important;
         }
   }
</style>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0;">
<table class="body-wrap" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background: #f6f6f6; margin: 0;">
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
<td class="container" width="600" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
<div class="content" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background: #fff; margin: 0; border: 1px solid #e9e9e9;">
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="alert alert-warning" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background: #FF9F00; margin: 0; padding: 20px;" align="center" valign="top">
{{ $title }}
</td>
</tr>
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-wrap" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
<strong>From : </strong> {{ config('mail.from.address') }}
</td>
</tr>
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
<strong>Subject : </strong> {{ $subject }}
</td>
</tr>
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
{!! $body !!}</br>

<a href="{{ url('account/activate', ['email' => $email, 'activation_token' => $activation_code]) }}">Verify Your Email</a>
</td>
</tr>
<tr>
<td>
You Can Log in Using this Credentials<br>
Username : <strong>{{ $username }}</strong><br>
</td>
</tr>
<tr>
<td>
 <br><br><br>
<strong>After Email is Verified</strong> <br>
 <br><br>
 1. You Can Start by <strong>Filling Up Your Shipping Address</strong>. <br>So We Know Where to Send Your Order. <br>
 <br><br>
 2. Start Adding Products To Your Cart.<br>
 <br><br>
 3. Check Out Your Order <br>
 <br><br>
 4. Choose From <strong>Multiple Payment Gateway </strong><br>
 <br><br>
 5. Settle Your Payment. Once Your Payment is Verified You Can Wait <strong>2-3 Business Days</strong> To Received Your Products. 
<br><br>
 <br><br>
Note: We Offer <strong>Free Shipping</strong> For Orders with Amount Greater than <strong>1500 php</strong> and For <strong>Pickup/Meet Up</strong> within Metro Manila. <br><br>For Pick Up You Can Call Our Hotline to Arrange Schedule
<br><br>
09054321510 - Globe<br>
09473475921 - Smart<br>
09435204828 - Sun<br> 
<br>
<br>
Enjoy Your Online Shopping Experience with Us!<br>

</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="footer" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

</tr>
</table>
</div></div>
</td>
<td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
</tr>
</table>
</body>
</html>