<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CheckStatus extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'status:check';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check Status of Auctions';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$results = Auction::get();
		$mytime = Carbon\Carbon::now();
		$mytime->addHours(5);
		$mytime->addMinutes(30);
		$mytime->toTimeString();
		$cdate = date('Y-m-d');

		$fdate = Carbon\Carbon::now();
		$fdate->addDay(1);



		foreach ($results as $result) {
/*
				$this->info($ldate);
				$this->info($result->end_date);
				$this->info($mytime->toTimeString());
				$this->info($result->end_time);
				$this->info($fdate->toDateString());*/
				
			if($cdate > $result->end_date && $result->last_bid_price >= $result->reserved_price)
			{
				DB::table('auctionsinfo')
    				->where('id',$result->id)
    				->update(array('status'=> 'Closed'));

    			$person = Bid::select('auction_name','user_id','bid_amount')->where('auction_id','=',$result->id)->where('bid_amount','=',$result->last_bid_price)->get();
				$this->info($person[0]['user_id']);	

				$user = User::where('email','=',$person[0]['user_id'])->get();
				if(!empty($user)){
					//print_r($user[0]['name']);
					Mail::send('email_message', array('name'=>$user[0]['name']), function ($message) use($person, $user){

	            	$message->to($person[0]['user_id'], $user[0]['name'])->subject('Congratulations!');

				});
				}

			}

			else if($cdate == $result->end_date && $mytime->toTimeString() >= $result->end_time && $result->last_bid_price >= $result->reserved_price)
			{
				DB::table('auctionsinfo')
    				->where('id',$result->id)
    				->update(array('status'=> 'Closed'));

    			$person = Bid::select('auction_name','user_id','bid_amount')->where('auction_id','=',$result->id)->where('bid_amount','=',$result->last_bid_price)->get();
				$this->info($person);

				$user = User::where('email','=',$person[0]['user_id'])->get();

				Mail::send('email_message', array('name'=>$user[0]['name']), function ($message) use($person, $user){

            	$message->to($person[0]['user_id'], $user[0]['name'])->subject('Congratulations!');

			});
			}

			else if($cdate > $result->end_date && $result->last_bid_price < $result->reserved_price)
			{
				DB::table('auctionsinfo')
    				->where('id',$result->id)
    				->update(array('end_date'=> $fdate->toDateString(), 'end_time'=> $mytime->toTimeString()));	
			}

			else if($cdate == $result->end_date && $mytime->toTimeString() > $result->end_time && $result->last_bid_price < $result->reserved_price)
			{

				DB::table('auctionsinfo')
    				->where('id',$result->id)
    				->update(array('end_date'=> $fdate->toDateString(), 'end_time'=> $mytime->toTimeString()));	
			}

			else {
				DB::table('auctionsinfo')
    				->where('id',$result->id)
    				->update(array('status'=> 'Active'));
			}
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		/*return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);*/
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		/*return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);*/
		return [];
	}

}
