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

Route::get('/', 'WelcomeController@index');
Route::get('registrar-paciente', 'WelcomeController@paciente');

Route::get('home', 'HomeController@index');

Route::post('register', ['as' => 'register', 'uses' => 'WelcomeController@register']);
Route::post('add-paciente', ['as' => 'newPaciente', 'uses' => 'WelcomeController@addPaciente']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
