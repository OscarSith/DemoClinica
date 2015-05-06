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

Route::group(['middleware' => 'guest'], function($route) {

	$route->get('login', 'Auth\AuthController@login');
	$route->post('login', 'Auth\AuthController@signin');
	$route->get('register-account', 'Auth\AuthController@register');
	$route->get('registrar-paciente', 'WelcomeController@paciente');

});

Route::group(['middleware' => 'auth'], function($route) {
	$route->get('/', 'HomeController@index');
	$route->post('add-paciente', ['as' => 'newPaciente', 'uses' => 'HomeController@addPaciente']);
	$route->get('logout', 'Auth\AuthController@getLogout');
});

Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@registerAccount']);

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	// 'password' => 'Auth\PasswordController',
// ]);