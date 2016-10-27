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
Route::get('home', 'HomeController@index');
Route::get('/index', 'UserAccountController@index');
Route::get('authentication/login', 'AuthenticationController@login');
Route::post('authentication/post_login', 'AuthenticationController@post_login');
Route::get('authentication/register', 'AuthenticationController@register');
Route::post('authentication/doRegister', 'AuthenticationController@doRegister');

Route::resource('useraccount', 'UserAccountController');

Route::resource('bank', 'ListBankController');
Route::resource('categories', 'CategoriesController');
Route::resource('stations', 'StationsController');
Route::resource('fuelcalulator', 'FuelCalculatorController');
Route::get('userpane/dashboard', 'UserPaneController@dashboard');

Route::get('userpane/fund_account', 'UserPaneController@fund_account');
Route::post('userpane/do_fund_account', 'UserPaneController@do_fund_account');

Route::get('userpane/buy_fuel','UserPaneController@buy_fuel');
Route::post('userpane/do_buy_fuel','UserPaneController@do_buy_fuel');

Route::get('userpane/transfer_fuel','UserPaneController@transfer_fuel');
Route::post('userpane/do_transfer_fuel','UserPaneController@do_transfer_fuel');

Route::get('userpane/buy_airtime','UserPaneController@buy_airtime');
Route::post('userpane/do_buy_airtime','UserPaneController@do_buy_airtime');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
