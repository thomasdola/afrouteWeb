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

elixir(function(mix) {
    mix.styles([
	    'bootstrap.css',
	    'font-awesome.css',
	    'icomoon.css',
	    'sweetalert.css',
	    'customselect.css',
	    'select.css',
	    'dropzone.css',
	    'jquery-confirm.min.css',
	    'animate.css',
	    'select2.min.css',
	    'select2-skins.min.css',
	    'styles.css',
	    'mystyles.css',
    ], 'public/css/all.css', 'resources/assets/css');

	mix.scripts([
		'jquery.js',
		'bootstrap.js',
		'slimmenu.js',
		'bootstrap-datepicker.js',
		'bootstrap-timepicker.js',
		'dropit.js',
		'ionrangeslider.js',
		'icheck.js',
		'fotorama.js',
		'magnific.js',
		'owl-carousel.js',
		'nicescroll.js',
		'fitvids.js',
		'countdown.js',
		'gridrotator.js',
		'mixitup.js',
		'select2.min.js',
		'dropzone.js',
		'jquery-confirm.min.js',
		'jquery.noty.js',
		'wysihtml5.all.js',
		'maskedinput.min.js',
		'custom.js',
	], 'public/js/all.js', 'resources/assets/js');
});
