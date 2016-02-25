<div class="row">
<div id="fb-root"></div>

<div data-lazy-widget="fb_1" class="fb-page collapsible-body" data-href="{{ $link->user->profile->social_links['fb-fanpage'] }}" data-tabs="messages" data-width="314" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
<div class="fb-xfbml-parse-ignore"><blockquote cite="{{ $link->user->profile->social_links['fb-fanpage'] }}"><a href="{{ $link->user->profile->social_links['fb-fanpage'] }}">{{ $link->user->profile->social_links['fb-fanpage'] }}</a></blockquote></div>
</div>

<div id="fb_1"><!--
    <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId={{ $link->user->profile->social_links['app_id'] }}";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>
    -->
</div>
</div>

