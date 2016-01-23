<!--Import App Template-->
@extends('app')

@section('head')
<!--Import Custom CSS-->
@endsection

@section('content')
<!--Import Content-->
<main>
<div id="profile-card" class="card">
    <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="images/user-bg.jpg" alt="user background">
    </div>
    <div class="card-content">
        <img src="images/avatar.jpg" alt="" class="circle responsive-img activator card-profile-image">
        <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
            <i class="mdi-action-account-circle"></i>
        </a>

        <span class="card-title activator grey-text text-darken-4">Roger Waters</span>
        <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
        <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
        <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>

    </div>
    <div class="card-reveal" style="display: none; transform: translateY(0px);">
        <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
        <p>Here is some more information about this card.</p>
        <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
        <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
        <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
        <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
        <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
    </div>
</div>
</main>
@endsection

@section('footer')

@endsection