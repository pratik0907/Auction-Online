<?php

class BidsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "wassup";
	}
 public function list12()
 {

		$bid = new Bid;
		$id= Input::get('Listing_id');
		$listing = Auction::find($id);


		$bid->bid_amount= Input::get('your_price');
		$bid->user_id = Auth::user()->email;
		$bid->auction_id = $id;
		$bid->auction_name = $listing->auction_name;
		$bid->save();
		DB::table('auctionsinfo')
    		->where('id',$id)
    		->update(array('last_bid_price'=> Input::get('your_price')));
		//return Redirect::to('/live_auctions')->with('message', 'Bid Placed!!');

 		/*$input= Input::get('Listing_id');
		DB::table('auctionsinfo')
    		->where('id',$input)
    		->update(array('status'=>'Closed'));
 		return $input;*/
 }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$listing = Auction::find($id);
		if(empty($listing))
		{
			return "Invalid url";
		}
		return View::make('bids.place_bid')->with('listing',$listing);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{



/*		$validator= Validator::make(Input::all(),['bid_amount'=>'required']);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$bid = new Bid;
		$id = Input::get('Listing_id')
		$listing = Auction::find($id);
		if(empty($listing))
		{
			return "Invalid url";
		}
		$bid->bid_amount= Input::get('bid_amount');
		$bid->user_id = Auth::user()->email;
		$bid->auction_id = $id;
		$bid->auction_name = $listing->auction_name;
		$bid->save();
		return Redirect::to('/')->with('message', 'Bid Placed!!');*/

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
