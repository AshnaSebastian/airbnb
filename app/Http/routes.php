<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();

	Route::get('/', ['as' => 'home', 'uses' => 'CountriesController@index']);

	Route::get('auth/github', 'Auth\SocialiteController@redirectToGithub');
	Route::get('auth/github/callback', 'Auth\SocialiteController@handleGithubCallback');

	Route::get('auth/facebook', 'Auth\SocialiteController@redirectToFacebook');
	Route::get('auth/facebook/callback', 'Auth\SocialiteController@handleFacebookCallback');

	Route::get('auth/twitter', 'Auth\SocialiteController@redirectToTwitter');
	Route::get('auth/twitter/callback', 'Auth\SocialiteController@handleTwitterCallback');

	Route::get('/home', 'HomeController@index');

	Route::get('room/{room}', ['as' => 'room', 'uses' => 'RoomsController@show']);

	Route::get('countries', ['as' => 'countries', 'uses' => 'CountriesController@index']);
	Route::get('country/{country}/rooms', 'CountriesController@rooms');


});

Route::group(['middleware' => ['web', 'auth']], function () {

	Route::post('bookings/{room}', ['as' => 'bookings.store', 'uses' => 'BookingsController@store']);

	// Route::get('/user/{user}/rooms', ['as' => 'user.rooms', 'uses' => 'UsersController@rooms']);
	Route::resource('user.rooms', 'UserRoomsController');
});

Route::group(['middleware' => 'api'], function(){
	Route::get('total-stay-days/{checkOut}/{checkIn}', 'Api\BookingsController@getTotalStayDays');
});