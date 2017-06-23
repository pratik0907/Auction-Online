<?php

class AuctionsController extends \BaseController {

	
	public function index()
	{
		//return 'yes';
	}

	public function towards_home()
	{
		return View::make('home');
	}


	public function create()
	{
		if(Auth::check())
		{
			return View::make('auctions.auctions_create');
		}
		return Redirect::to('/login');
		
	}

	public function auction_details($sid)
	{
		$listing = Auction::find($sid);
		//$bid = Bid::find($sid);
		if(empty($listing))
		{
			return "Invalid url";
		}
		return View::make('auctions.show')->with('listing',$listing);
	}


	public function store()
	{

		$validator= Validator::make(Input::all(),['auction_name'=>'required','start_price'=>'required','reserved_price'=>'required','selling_price'=>'required','start_date'=>'required','start_time'=>'required','end_date'=>'required','end_time'=>'required','min_bid'=>'required','status'=>'required']);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$auctions = new Auction;
		$auctions->auction_name = Input::get('auction_name');
		$auctions->start_price = Input::get('start_price');
		$auctions->reserved_price = Input::get('reserved_price');
		$auctions->selling_price = Input::get('selling_price');
		$auctions->last_bid_price = Input::get('start_price');
		$auctions->start_date = Input::get('start_date');
		$auctions->start_time = Input::get('start_time');
		$auctions->end_date = Input::get('end_date');
		$auctions->end_time = Input::get('end_time');
		$auctions->min_bid = Input::get('min_bid');
		$auctions->status = Input::get('status');
		$auctions->user_id = Auth::user()->email;
		$auctions->save();
		return Redirect::to('/home')->with('message', 'Auction Created Successfully');
		//return "Created Successfully";
	}



	public function show()
	{
		$listings = Auction::all();
		return View::make('auctions.auctions_listings')->with('listings',$listings);
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
        $id = Input::get('id');
        dd($id);

		DB::table('auctionsinfo')
    		->where('id',$id)
    		->update(array('status'=>'Closed'));
	}


	public function destroy($id)
	{
		//
	}


}
