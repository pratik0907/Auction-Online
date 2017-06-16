<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});



Route::get('home',function()
{
	return 'Home Page';
})->before('auth');


Route::get('login','SessionController@create');

Route::get('logout','SessionController@destroy');

Route::get('create_auction','AuctionsController@create');

Route::resource('users','UserController');

Route::resource('sessions','SessionController');

Route::resource('auctions','AuctionsController');

