<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Auction extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps=true;
	protected $fillable= ['auction_name','start_price','reserved_price','user_id','selling_price','status','start_time','end_time','min_bid','last_bid_price',];

	public static $rules = [
		'name' => 'required',
		'password' => 'required',
		'email' => 'required',
		'gender' => 'required'
	];

	protected $table = 'auctionsinfo';

	protected $hidden = array('selling_price', 'remember_token', 'reserved_price');



	

}
