<li class="no-padding ">
    <ul class="collapsible collapsible-accordion ">
      <li>
        <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">contact_phone</i>Contact Me:</a>
        <div class="collapsible-body">
        <!-- Options (json) -->
          <ul class="teal lighten-5">
            <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Globe: {{ $link->user->profile->contact_no }}</a></li>
            <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Smart: {{ $link->user->profile->contact_no }}</a></li>
            <li><a href="tel:{{ $link->user->profile->contact_no }}" class="waves-effect waves-light waves-red lighten-5 teal-text">Sun :{{ $link->user->profile->contact_no }}</a></li>
          </ul>
        </div>
      </li>
    </ul>
</li>