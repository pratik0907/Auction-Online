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



/*Route::get('home',function()
{
	return 'Home Page';
})->before('auth');*/

Route::get('home','AuctionsController@towards_home')->before('auth');
Route::get('live_auctions','AuctionsController@show');
Route::get('auction/{id}','AuctionsController@auction_details');


Route::get('login','SessionController@create');

Route::get('logout','SessionController@destroy');

Route::get('create_auction','AuctionsController@create');

Route::resource('users','UserController');

Route::resource('sessions','SessionController');

Route::resource('auctions','AuctionsController');

/*Route::get('auction/{id}',function($sid)
{	
	
	$listing = Auction::find($sid);
	if(empty($listing))
	{
		return "Invalid url";
	}
	return View::make('auctions.show')->with('listing',$listing);
	//return $listing->auction_name;
});
*/
