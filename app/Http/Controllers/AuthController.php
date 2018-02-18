<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AuthController extends ClientController
{

	public function __construct()
	{
		//
	}

	public function index()
	{
		//
	}

	public function showLoginForm()
	{

		return view('login');

	}

	public function login(Request $request)
	{

        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

     	// return redirect('/')->withCookie('token', 'Bearer ');

		// $user = \DB::connection('darcade')
		// 	->table('users')
		// 	->where('email', '=', $email)
		// 	->where('password', '=', $password)
		// 	->get();

	}

	public function register()
	{
		//
	}

}
