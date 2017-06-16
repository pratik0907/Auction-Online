<?php

class UserController extends \BaseController {


	public function create()
	{
		/*User:: create([
			'name' => 'deepanshu',
			'password' => 'deep21shu',
			'email' => 'notmyname',
			'gender' => 'M'
			]);
		return User::all();*/
		if(Auth::check()) return Redirect::to('/home');  //
		return View::make('users.create');
	}


	public function store()
	{
		//return Input::all();

		$validator= Validator::make(Input::all(),['name'=>'required','password'=>'required','email'=>'required','sex'=>'required']);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$users = new User;
		$users->name = Input::get('name');
		$users->password = Hash::make(Input::get('password'));
		$users->email = Input::get('email');
		$users->gender = Input::get('sex');
		$users->save();
		if(Auth::attempt(Input::only('email','password')))
		{
			return Redirect::to('/home');
			//return 'Welcome ' .Auth::user()->name. '!';
		}
		//Auth::login($users);
		//return Redirect::to('/home');
	}


	public function index()
	{
		//if(Auth::check()) return Redirect::to('/home');
		return Redirect::to('/login');
		//return "User Successfully registered";
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
