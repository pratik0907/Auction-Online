<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FirstCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:winner';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'find the winner';

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
		//logic
		/*if ($this->confirm('Are you sure?'))
		{
			$this->info('Cool! You are sure.');
		}*/

		//$this->info('User generated');
		/*$this->info($this->argument('username'));



		
		$user = new User;
		$user->name = $this->argument('username');
		$user->email = $this->argument('email');
		$user->password = $this->argument(Hash::make('password'));
		$user->gender = $this->argument('gender');
		$user->save();*/

		$results = Auction::where('status','=','Active')->get();

		foreach($results as $result)
		{
			if($result->last_bid_price >= $result->reserved_price)
			{
				$person = Bid::select('user_id','bid_amount')->where('auction_id','=',$result->id)->where('bid_amount','=',$result->last_bid_price)->get();
				$this->info($person);
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
			array('username', InputArgument::REQUIRED, 'user\'s username'),
				array('email', InputArgument::REQUIRED, 'user\'s email'),
				array('password', InputArgument::REQUIRED, 'user\'s password'),
				array('gender', InputArgument::REQUIRED, 'user\'s gender')
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
