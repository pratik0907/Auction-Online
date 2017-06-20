<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bid extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps=true;
	/*protected $fillable= ['auction_name','min_bid','reserved_price','user_id','selling_price','status','start_time','end_time','last_bid_price'];*/

	/*public static $rules = [
		'name' => 'required',
		'password' => 'required',
		'email' => 'required',
		'gender' => 'required'
	];*/

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bidsinfo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('selling_price', 'remember_token', 'reserved_price');



	

}
