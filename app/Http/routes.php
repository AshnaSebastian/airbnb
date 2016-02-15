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

	Route::get('/home', 'HomeController@index');

	Route::get('room/{room}', 'RoomsController@show');
});

Route::group(['middleware' => ['web', 'auth']], function () {

	Route::post('bookings/{room}', ['as' => 'bookings.store', 'uses' => 'BookingsController@store']);

});