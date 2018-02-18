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

	}

	public function register()
	{
		//
	}

}
