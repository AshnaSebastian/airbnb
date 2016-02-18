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

var bowerPath = '../../../bower_components/';

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css/app.css')
    	.styles([
    		'app.css',
    		bowerPath + 'bootstrap/dist/css/bootstrap.css',
    		bowerPath + 'font-awesome/css/font-awesome.css'
    	], 'public/css/all.css')

    	.scripts([
    		bowerPath + 'jquery/dist/jquery.js',
    		bowerPath + 'bootstrap/dist/js/bootstrap.js'
    	], 'public/js/all.js')

        .styles([
            bowerPath + 'jquery-ui/themes/smoothness/jquery-ui.css'
        ], 'public/css/datepicker.css')

        .scripts([
            bowerPath + 'jquery-ui/jquery-ui.js'
        ], 'public/js/datepicker.js')

        .copy('bower_components/bootstrap/dist/fonts/', 'public/build/fonts')
        .copy('bower_components/font-awesome/fonts/', 'public/build/fonts')
        .copy('bower_components/jquery-ui/themes/smoothness/images/', 'public/build/css/images')

	.version([
		'public/css/all.css',
		'public/js/all.js',

        'public/css/datepicker.css',
        'public/js/datepicker.js',
		]);

    mix.browserify('components/Bookingform.js');

});
