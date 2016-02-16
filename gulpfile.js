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

    	.copy('bower_components/bootstrap/dist/fonts/', 'public/build/fonts')
    	.copy('bower_components/font-awesome/fonts/', 'public/build/fonts')

    	.version([
    		'public/css/all.css',
    		'public/js/all.js'
    		]);
});
