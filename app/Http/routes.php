<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('page.welcome');
});

Route::get('/dashboard', 'dashboardController@index');

Route::get('/profile', function () {
    return view('login.profile');
});

Route::get('/psikotest', function () {
    return view('login.psikotest');
});

/*Route::get('/hasilpsikotes', function () {
    return view('login.hasil');
});*/

Route::get('/search', function () {
    return view('login.search');
});

Route::resource('pengaturan', 'bioController');
Route::post('pengaturan/{id}/update', 'bioController@update');

Route::get('profile/{id}', 'bioController@profile');
Route::post('profile/{id}/like', 'bioController@like');

Route::resource('notifikasi', 'notifController');

/* Auth */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);