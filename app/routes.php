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

Route::get('/online_auction', function()
{
	return View::make('welcome');
});


Route::get('login','SessionController@create');
Route::get('logout','SessionController@destroy');

Route::get('home','AuctionsController@towards_home')->before('auth');
Route::get('create_auction','AuctionsController@create');
Route::get('live_auctions','AuctionsController@show');
Route::get('auction/{id}','AuctionsController@auction_details');

Route::get('auction/{id}/place','BidsController@create');
Route::post('auction/bid/placed','BidsController@list12');

Route::resource('users','UserController');
Route::resource('sessions','SessionController');
Route::resource('auctions','AuctionsController');

