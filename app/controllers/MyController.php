<?php

class MyController extends BaseController {

	public function my_func()
	{
		$name= "Pratik";
		return View::make("hello1")->with('name',$name)	;
	}


	public function display_db()
	{
		$user = DB::table('users')->get();
		return $user;
	}

}
