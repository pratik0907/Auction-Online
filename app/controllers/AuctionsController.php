<?php

class AuctionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('auctions.auctions_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$auctions = new Auction;
		$auctions->auction_name = Input::get('auction_name');
		$auctions->min_bid = Input::get('min_bid');
		$auctions->reserved_price = Input::get('reserved_price');
		$auctions->selling_price = Input::get('selling_price');
		$auctions->last_bid_price = Input::get('min_bid');
		$auctions->start_date = Input::get('start_date');
		$auctions->start_time = Input::get('start_time');
		$auctions->end_date = Input::get('end_date');
		$auctions->end_time = Input::get('end_time');
		$auctions->status = Input::get('status');
		$auctions->user_id = Auth::user()->email;
		$auctions->save();
		return Redirect::to('/home')->with('message', 'Auction Created Successfully');
		//return "Created Successfully";
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
