<?php



class SessionController extends \BaseController {


	public function create()
	{
		if(Auth::check()) return Redirect::to('/home');     //home
		return View::make('sessions.screate');
	}


	public function store()
	{


		$validator= Validator::make(Input::all(),['email'=>'required','password'=>'required']);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		if(Auth::attempt(Input::only('email','password')))
		{
			return Redirect::to('/home');
			//return 'Welcome ' .Auth::user()->name. '!';
		}
		//return Redirect::back()->withInput()->withErrors($validator->messages());
		return Redirect::to('/login')->with('message', 'Please Enter Valid Email id and password');
	}


	public function index()
	{
		return Redirect::to('/login');
	}


	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/login');
	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}

}
