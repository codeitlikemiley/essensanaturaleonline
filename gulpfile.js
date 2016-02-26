var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.scripts([
//     'jquery-2.1.1.min.js',
//     'materialize.min.js',
//     'jquery-ui.min.js',
//     'lazyloadxt.extra.min.js',
//     'lazyloadxt.widget.min.js'
//     ],'public/js/vendor.js');
// });


elixir(function(mix) {
    mix.styles([
    'materialize.css',
    'jquery.lazyloadxt.fadein.min.css',
    'jquery.lazyloadxt.spinner.min.css',
    'jqueryui.css',
    'grecaptcha.css',
    'custom.css'
    ],'public/css/vendor.css');
});


