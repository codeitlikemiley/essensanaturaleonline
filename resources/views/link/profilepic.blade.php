<div class="card teal lighten-5">
              {{-- Company Logo --}}
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="{{ $link->user->profile->profile_pic }}">
              </div>

              {{-- Company Finder Button --}}
              <div class="card-content">
                  <span class="card-title activator teal-text">Official Office<i class="material-icons left">location_on</i></span>
                  <p><a href="http://iregister.sec.gov.ph/MainServlet?param=search" class="teal-text" target="_blank">SEC-Registered<i class="material-icons left">verified_user</i></a></p>
              </div>

              {{-- Google Map --}}
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Official Office<i class="material-icons left">close</i></span>
                 <iframe src="https://www.google.com/maps/d/u/0/embed?mid=zkYyseM1DRiQ.kLrjC08br2XU" width="200" height="250"></iframe>
              </div>
        </div>