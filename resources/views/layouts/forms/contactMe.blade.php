@if($link->user->profile->contact_options)
    <div class="no-padding">
   
            <ul class="collapsible collapsible-accordion">
              <li>
                <a class="active collapsible-header waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">contact_phone</i>For Inqueries Call<i class="material-icons right">keyboard_arrow_down</i></a>
                <div class="collapsible-body">
                {{--*/ $name = $link->user->profile->first_name.' '.$link->user->profile->last_name /*--}}
                <!-- Options (json) -->
                  <ul class="teal lighten-5 collection with-header">
                  <li class="collection-header"><img src=
                  "
                  @if($link->user->profile->profile_pic)
                  {{ $link->user->profile->profile_pic }}
                  @else
                  {{ Avatar::create($name)->toBase64() }}
                  @endif
                  " class="circle responsive-img left" style="height:50px; width:50px; border-radius: 25px;"><h5 class="amber-text center">{{ $name }}</h5></li>
                  @if($link->user->profile->contact_options['globe'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['globe'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">Globe: {{ $link->user->profile->contact_options['globe'] }}</a></li>
                  @endif
                  @if($link->user->profile->contact_options['smart'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['smart'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">Smart: {{ $link->user->profile->contact_options['smart'] }}</a></li>
                  @endif
                  @if($link->user->profile->contact_options['sun'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['sun'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">Sun: {{ $link->user->profile->contact_options['sun'] }}</a></li>
                  @endif
                  @if($link->user->profile->contact_options['tm'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['tm'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">TM: {{ $link->user->profile->contact_options['tm'] }}</a></li>
                  @endif
                  @if($link->user->profile->contact_options['skype'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['skype'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">Skype: {{ $link->user->profile->contact_options['skype'] }}</a></li>
                  @endif
                  @if($link->user->profile->contact_options['viber'])
                    <li><a href="tel:{{ $link->user->profile->contact_options['viber'] }}" class="collection-item waves-effect waves-light waves-red lighten-5 teal-text">Viber: {{ $link->user->profile->contact_options['viber'] }}</a></li>
                  @endif
                    
                  </ul>
                  
                </div>
              </li>
              <li>
              <div class="col s12">
              <a class="active collapsible-header waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">pages</i>Message Me in Facebook<i class="material-icons right">keyboard_arrow_down</i></a>
              @include('layouts.forms.fb-fanpage')
              </div>
              </li>
            </ul>
        </div>
        @endif