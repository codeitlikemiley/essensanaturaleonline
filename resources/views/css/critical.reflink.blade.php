<style>
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v12/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}

.red.lighten-2 {
  background-color: #E57373 !important;
}

.red.lighten-1 {
  background-color: #EF5350 !important;
}

.red {
  background-color: #F44336 !important;
}

.red.darken-4 {
  background-color: #B71C1C !important;
}

.blue {
  background-color: #2196F3 !important;
}

.light-blue.lighten-5 {
  background-color: #e1f5fe !important;
}

.light-blue {
  background-color: #03a9f4 !important;
}

.teal.lighten-5 {
  background-color: #e0f2f1 !important;
}

.teal.lighten-3 {
  background-color: #80cbc4 !important;
}

.teal {
  background-color: #009688 !important;
}

.teal-text {
  color: #009688 !important;
}

.yellow {
  background-color: #ffeb3b !important;
}

.yellow.darken-1 {
  background-color: #fdd835 !important;
}

.amber {
  background-color: #ffc107 !important;
}

.amber-text {
  color: #ffc107 !important;
}

.amber.darken-2 {
  background-color: #ffa000 !important;
}

.orange {
  background-color: #ff9800 !important;
}

.grey-text {
  color: #9e9e9e !important;
}

.grey-text.text-darken-4 {
  color: #212121 !important;
}

.white {
  background-color: #fff !important;
}

.white-text {
  color: #fff !important;
}

html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

body {
  margin: 0;
}

main,
nav {
  display: block;
}

a {
  background-color: transparent;
}

strong {
  font-weight: bold;
}

img {
  border: 0;
}

input {
  color: inherit;
  font: inherit;
  margin: 0;
}

input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

input {
  line-height: normal;
}

input[type="search"] {
  -webkit-appearance: textfield;
  box-sizing: content-box;
}

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

ul {
  list-style-type: none;
}

a {
  color: #039be5;
  text-decoration: none;
}

.valign-wrapper {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
}

ul {
  padding: 0;
}

ul li {
  list-style-type: none;
}

nav,
.card,
.btn-large,
.btn-floating,
.collapsible,
.side-nav {
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
}

.z-depth-2 {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}

.modal {
  box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);
}

blockquote {
  margin: 20px 0;
  padding-left: 1.5rem;
  border-left: 5px solid #ee6e73;
}

i {
  line-height: inherit;
}

i.left {
  float: left;
  margin-right: 15px;
}

i.right {
  float: right;
  margin-left: 15px;
}

img.responsive-img {
  max-width: 100%;
  height: auto;
}

@media only screen and (max-width: 992px) {
  .hide-on-med-and-down {
    display: none !important;
  }
}

@media only screen and (min-width: 993px) {
  .hide-on-large-only {
    display: none !important;
  }
}

@media only screen and (min-width: 993px) {
  .show-on-large {
    display: block !important;
  }
}

.collection {
  margin: 0.5rem 0 1rem 0;
  border: 1px solid #e0e0e0;
  border-radius: 2px;
  overflow: hidden;
  position: relative;
}

.collection .collection-item {
  background-color: #fff;
  line-height: 1.5rem;
  padding: 10px 20px;
  margin: 0;
  border-bottom: 1px solid #e0e0e0;
}

.collection .collection-item:last-child {
  border-bottom: none;
}

.collection a.collection-item {
  display: block;
  color: #26a69a;
}

.collection.with-header .collection-header {
  background-color: #fff;
  border-bottom: 1px solid #e0e0e0;
  padding: 10px 20px;
}

.collection.with-header .collection-item {
  padding-left: 30px;
}

.collapsible .collection {
  margin: 0;
  border: none;
}

.center,
.center-align {
  text-align: center;
}

.left {
  float: left !important;
}

.right {
  float: right !important;
}

.circle {
  border-radius: 50%;
}

.no-padding {
  padding: 0 !important;
}

.material-icons {
  text-rendering: optimizeLegibility;
  -webkit-font-feature-settings: 'liga';
  -moz-font-feature-settings: 'liga';
  font-feature-settings: 'liga';
}

.row {
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 20px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.row .col {
  float: left;
  box-sizing: border-box;
  padding: 0 0.75rem;
}

.row .col[class*="push-"],
.row .col[class*="pull-"] {
  position: relative;
}

.row .col.s3 {
  width: 25%;
  margin-left: auto;
  left: auto;
  right: auto;
}

.row .col.s6 {
  width: 50%;
  margin-left: auto;
  left: auto;
  right: auto;
}

.row .col.s12 {
  width: 100%;
  margin-left: auto;
  left: auto;
  right: auto;
}

.row .col.offset-s3 {
  margin-left: 25%;
}

@media only screen and (min-width: 601px) {
  .row .col.m3 {
    width: 25%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.m5 {
    width: 41.6666666667%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.m6 {
    width: 50%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.m8 {
    width: 66.6666666667%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.m9 {
    width: 75%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.m12 {
    width: 100%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.pull-m1 {
    right: 8.3333333333%;
  }

  .row .col.push-m1 {
    left: 8.3333333333%;
  }
}

@media only screen and (min-width: 993px) {
  .row .col.l3 {
    width: 25%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.l5 {
    width: 41.6666666667%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.l6 {
    width: 50%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.l9 {
    width: 75%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.l12 {
    width: 100%;
    margin-left: auto;
    left: auto;
    right: auto;
  }

  .row .col.pull-l1 {
    right: 8.3333333333%;
  }

  .row .col.push-l1 {
    left: 8.3333333333%;
  }
}

nav {
  color: #fff;
  background-color: #ee6e73;
  width: 100%;
  height: 56px;
  line-height: 56px;
}

nav a {
  color: #fff;
}

nav i,
nav i.material-icons {
  display: block;
  font-size: 2rem;
  height: 56px;
  line-height: 56px;
}

nav .nav-wrapper {
  position: relative;
  height: 100%;
}

@media only screen and (min-width: 993px) {
  nav a.button-collapse {
    display: none;
  }
}

nav .button-collapse {
  float: left;
  position: relative;
  z-index: 1;
  height: 56px;
}

nav .button-collapse i {
  font-size: 2.7rem;
  height: 56px;
  line-height: 56px;
}

nav .brand-logo {
  position: absolute;
  color: #fff;
  display: inline-block;
  font-size: 2.1rem;
  padding: 0;
  white-space: nowrap;
}

@media only screen and (max-width: 992px) {
  nav .brand-logo {
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
  }
}

nav ul {
  margin: 0;
}

nav ul li {
  float: left;
  padding: 0;
}

nav ul a {
  font-size: 1rem;
  color: #fff;
  display: block;
  padding: 0 15px;
}

nav .input-field {
  margin: 0;
}

nav .input-field input {
  height: 100%;
  font-size: 1.2rem;
  border: none;
  padding-left: 2rem;
}

nav .input-field label {
  top: 0;
  left: 0;
}

nav .input-field label i {
  color: rgba(255,255,255,0.7);
}

.navbar-fixed {
  position: relative;
  height: 56px;
  z-index: 998;
}

.navbar-fixed nav {
  position: fixed;
}

@media only screen and (min-width: 601px) {
  nav,
  nav .nav-wrapper i,
  nav a.button-collapse,
  nav a.button-collapse i {
    height: 64px;
    line-height: 64px;
  }

  .navbar-fixed {
    height: 64px;
  }
}

@font-face {
  font-family: "Roboto";
  src: local(Roboto Thin),url("../font/roboto/Roboto-Thin.eot");
  src: url("../font/roboto/Roboto-Thin.eot?#iefix") format("embedded-opentype"),url("../font/roboto/Roboto-Thin.woff2") format("woff2"),url("../font/roboto/Roboto-Thin.woff") format("woff"),url("../font/roboto/Roboto-Thin.ttf") format("truetype");
  font-weight: 200;
}

@font-face {
  font-family: "Roboto";
  src: local(Roboto Light),url("../font/roboto/Roboto-Light.eot");
  src: url("../font/roboto/Roboto-Light.eot?#iefix") format("embedded-opentype"),url("../font/roboto/Roboto-Light.woff2") format("woff2"),url("../font/roboto/Roboto-Light.woff") format("woff"),url("../font/roboto/Roboto-Light.ttf") format("truetype");
  font-weight: 300;
}

@font-face {
  font-family: "Roboto";
  src: local(Roboto Regular),url("../font/roboto/Roboto-Regular.eot");
  src: url("../font/roboto/Roboto-Regular.eot?#iefix") format("embedded-opentype"),url("../font/roboto/Roboto-Regular.woff2") format("woff2"),url("../font/roboto/Roboto-Regular.woff") format("woff"),url("../font/roboto/Roboto-Regular.ttf") format("truetype");
  font-weight: 400;
}

@font-face {
  font-family: "Roboto";
  src: url("../font/roboto/Roboto-Medium.eot");
  src: url("../font/roboto/Roboto-Medium.eot?#iefix") format("embedded-opentype"),url("../font/roboto/Roboto-Medium.woff2") format("woff2"),url("../font/roboto/Roboto-Medium.woff") format("woff"),url("../font/roboto/Roboto-Medium.ttf") format("truetype");
  font-weight: 500;
}

@font-face {
  font-family: "Roboto";
  src: url("../font/roboto/Roboto-Bold.eot");
  src: url("../font/roboto/Roboto-Bold.eot?#iefix") format("embedded-opentype"),url("../font/roboto/Roboto-Bold.woff2") format("woff2"),url("../font/roboto/Roboto-Bold.woff") format("woff"),url("../font/roboto/Roboto-Bold.ttf") format("truetype");
  font-weight: 700;
}

a {
  text-decoration: none;
}

html {
  line-height: 1.5;
  font-family: "Roboto", sans-serif;
  font-weight: normal;
  color: rgba(0,0,0,0.87);
}

@media only screen and (min-width: 0) {
  html {
    font-size: 14px;
  }
}

@media only screen and (min-width: 992px) {
  html {
    font-size: 14.5px;
  }
}

@media only screen and (min-width: 1200px) {
  html {
    font-size: 15px;
  }
}

h5,
h6 {
  font-weight: 400;
  line-height: 1.1;
}

h5 {
  font-size: 1.64rem;
  line-height: 110%;
  margin: 0.82rem 0 0.656rem 0;
}

h6 {
  font-size: 1rem;
  line-height: 110%;
  margin: 0.5rem 0 0.4rem 0;
}

strong {
  font-weight: 500;
}

.card {
  position: relative;
  margin: 0.5rem 0 1rem 0;
  background-color: #fff;
  border-radius: 2px;
}

.card .card-title {
  font-size: 24px;
  font-weight: 300;
}



.card .card-image {
  position: relative;
}

.card .card-image img {
  display: block;
  border-radius: 2px 2px 0 0;
  position: relative;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  width: 100%;
}

.card .card-content {
  padding: 20px;
  border-radius: 0 0 2px 2px;
}

.card .card-content p {
  margin: 0;
  color: inherit;
}

.card .card-content .card-title {
  line-height: 48px;
}

.card .card-reveal {
  padding: 20px;
  position: absolute;
  background-color: #fff;
  width: 100%;
  overflow-y: auto;
  top: 100%;
  height: 100%;
  z-index: 1;
  display: none;
}

.card .card-reveal .card-title {
  display: block;
}

.tabs {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  overflow-x: auto;
  overflow-y: hidden;
  height: 48px;
  background-color: #fff;
  margin: 0 auto;
  width: 100%;
  white-space: nowrap;
}

.tabs .tab {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  display: block;
  float: left;
  text-align: center;
  line-height: 48px;
  height: 48px;
  padding: 0;
  margin: 0;
  text-transform: uppercase;
  text-overflow: ellipsis;
  overflow: hidden;
  letter-spacing: .8px;
  width: 15%;
  min-width: 80px;
}

.tabs .tab a {
  color: #ee6e73;
  display: block;
  width: 100%;
  height: 100%;
  text-overflow: ellipsis;
  overflow: hidden;
}

.btn-large,
.btn-flat {
  border: none;
  border-radius: 2px;
  display: inline-block;
  height: 36px;
  line-height: 36px;
  outline: 0;
  padding: 0 2rem;
  text-transform: uppercase;
  vertical-align: middle;
}

.btn-large i,
.btn-floating i,
.btn-large i {
  font-size: 1.3rem;
  line-height: inherit;
}

.btn-large {
  text-decoration: none;
  color: #fff;
  background-color: #26a69a;
  text-align: center;
  letter-spacing: .5px;
}

.btn-floating {
  display: inline-block;
  color: #fff;
  position: relative;
  overflow: hidden;
  z-index: 1;
  width: 37px;
  height: 37px;
  line-height: 37px;
  padding: 0;
  background-color: #26a69a;
  border-radius: 50%;
  vertical-align: middle;
}

.btn-floating i {
  width: inherit;
  display: inline-block;
  text-align: center;
  color: #fff;
  font-size: 1.6rem;
  line-height: 37px;
}

.btn-floating:before {
  border-radius: 0;
}

.btn-floating.btn-large {
  width: 55.5px;
  height: 55.5px;
}

.btn-floating.btn-large i {
  line-height: 55.5px;
}

.fixed-action-btn {
  position: fixed;
  right: 23px;
  bottom: 23px;
  padding-top: 15px;
  margin-bottom: 0;
  z-index: 998;
}

.fixed-action-btn ul {
  left: 0;
  right: 0;
  text-align: center;
  position: absolute;
  bottom: 64px;
  margin: 0;
  visibility: hidden;
}

.fixed-action-btn ul li {
  margin-bottom: 15px;
}

.fixed-action-btn ul a.btn-floating {
  opacity: 0;
}

.btn-flat {
  box-shadow: none;
  background-color: transparent;
  color: #343434;
}

.btn-large {
  height: 54px;
  line-height: 56px;
}

.btn-large i {
  font-size: 1.6rem;
}

.waves-effect {
  position: relative;
  display: inline-block;
  overflow: hidden;
  vertical-align: middle;
  z-index: 1;
  will-change: opacity, transform;
}

.waves-block {
  display: block;
}

.modal {
  display: none;
  position: fixed;
  left: 0;
  right: 0;
  background-color: #fafafa;
  padding: 0;
  max-height: 70%;
  width: 55%;
  margin: auto;
  overflow-y: auto;
  border-radius: 2px;
  will-change: top, opacity;
}

@media only screen and (max-width: 992px) {
  .modal {
    width: 80%;
  }
}

.modal .modal-content {
  padding: 24px;
}



.modal .modal-footer {
  border-radius: 0 0 2px 2px;
  background-color: #fafafa;
  padding: 4px 6px;
  height: 56px;
  width: 100%;
}

.modal .modal-footer .btn-large,
.modal .modal-footer .btn-flat {
  float: right;
  margin: 6px 0;
}

.modal.bottom-sheet {
  top: auto;
  bottom: -100%;
  margin: 0;
  width: 100%;
  max-height: 45%;
  border-radius: 0;
  will-change: bottom, opacity;
}

.collapsible {
  border-top: 1px solid #ddd;
  border-right: 1px solid #ddd;
  border-left: 1px solid #ddd;
  margin: 0.5rem 0 1rem 0;
}

.collapsible-header {
  display: block;
  min-height: 3rem;
  line-height: 3rem;
  padding: 0 1rem;
  background-color: #fff;
  border-bottom: 1px solid #ddd;
}

.collapsible-header i {
  width: 2rem;
  font-size: 1.6rem;
  line-height: 3rem;
  display: block;
  float: left;
  text-align: center;
  margin-right: 1rem;
}

.collapsible-body {
  display: none;
  border-bottom: 1px solid #ddd;
  box-sizing: border-box;
}
.side-nav .collapsible {
  border: none;
  box-shadow: none;
}
.side-nav .collapsible li {
  padding: 0;
}
.side-nav .collapsible-header {
  background-color: transparent;
  border: none;
  line-height: inherit;
  height: inherit;
  margin: 0 1rem;
}
.side-nav .collapsible-header i {
  line-height: inherit;
}
.side-nav .collapsible-body {
  border: 0;
  background-color: #fff;
}
.side-nav .collapsible-body li a {
  margin: 0 1rem 0 2rem;
}
label {
  font-size: 0.8rem;
  color: #9e9e9e;
}
::-webkit-input-placeholder {
  color: #d1d1d1;
}
:-moz-placeholder {
  color: #d1d1d1;
}
::-moz-placeholder {
  color: #d1d1d1;
}
:-ms-input-placeholder {
  color: #d1d1d1;
}
input[type=text],
input[type=search] {
  background-color: transparent;
  border: none;
  border-bottom: 1px solid #9e9e9e;
  border-radius: 0;
  outline: none;
  height: 3rem;
  width: 100%;
  font-size: 1rem;
  margin: 0 0 15px 0;
  padding: 0;
  box-shadow: none;
  box-sizing: content-box;
}
input[type=text]+label:after,
input[type=search]+label:after {
  display: block;
  content: "";
  position: absolute;
  top: 65px;
  opacity: 0;
}
.input-field {
  position: relative;
  margin-top: 1rem;
}
.input-field label {
  color: #9e9e9e;
  position: absolute;
  top: 0.8rem;
  left: 0.75rem;
  font-size: 1rem;
}
.input-field input[type=search] {
  display: block;
  line-height: inherit;
  padding-left: 4rem;
  width: calc(100% - 4rem);
}
.input-field input[type=search]+label {
  left: 1rem;
}
.input-field input[type=search] ~ .material-icons {
  position: absolute;
  top: 0;
  right: 1rem;
  color: transparent;
  font-size: 2rem;
}
.side-nav {
  position: fixed;
  width: 240px;
  left: -105%;
  top: 0;
  margin: 0;
  height: 100%;
  height: calc(100% + 60px);
  height: -moz-calc(100%);
  padding-bottom: 60px;
  background-color: #fff;
  z-index: 999;
  overflow-y: auto;
  will-change: left;
}
.side-nav .collapsible {
  margin: 0;
}
.side-nav li {
  float: none;
  padding: 0 15px;
  line-height: 64px;
}
.side-nav a {
  color: #444;
  display: block;
  font-size: 1rem;
  height: 64px;
  line-height: 64px;
  padding: 0 15px;
}
.preloader-wrapper {
  display: inline-block;
  position: relative;
  width: 48px;
  height: 48px;
}
.preloader-wrapper.big {
  width: 64px;
  height: 64px;
}
.spinner-layer {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  border-color: #26a69a;
}
.spinner-blue {
  border-color: #4285f4;
}
.spinner-red {
  border-color: #db4437;
}
.spinner-yellow {
  border-color: #f4b400;
}
.spinner-green {
  border-color: #0f9d58;
}
.active .spinner-layer {
  opacity: 1;
}
.gap-patch {
  position: absolute;
  top: 0;
  left: 45%;
  width: 10%;
  height: 100%;
  overflow: hidden;
  border-color: inherit;
}
.gap-patch .circle {
  width: 1000%;
  left: -450%;
}
.circle-clipper {
  display: inline-block;
  position: relative;
  width: 50%;
  height: 100%;
  overflow: hidden;
  border-color: inherit;
}
.circle-clipper .circle {
  width: 200%;
  height: 100%;
  border-width: 3px;
  border-style: solid;
  border-color: inherit;
  border-bottom-color: transparent !important;
  border-radius: 50%;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
}
.circle-clipper.left .circle {
  left: 0;
  border-right-color: transparent !important;
  -webkit-transform: rotate(129deg);
  transform: rotate(129deg);
}
.circle-clipper.right .circle {
  left: -100%;
  border-left-color: transparent !important;
  -webkit-transform: rotate(-129deg);
  transform: rotate(-129deg);
}
body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}
main {
  flex: 1 0 auto;
}
.tabs {
  margin-top: 1em;
}
.tabs .tab a {
  color: #4db6ac;
}
</style>