<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends ClientController
{
	public function showLoginForm(Request $request)
	{
		if ($request->session()->has('user_id'))
		{
			return redirect()->route('home');
		}

		return view('login');
	}

	public function login(Request $request)
	{
		if ($request->session()->has('user_id'))
		{
			return redirect()->route('home');
		}

        $email = $request->input('email');
        $password = $request->input('password');

        try {

			$login_request = $this->postApiRequest('auth', [

				'headers'=> [
					'Accept'=> 'application/json',
					'X-Requested-With'=> 'XMLHttpRequest'
				],
				'form_params' => [
			        'email'=> $email,
					'password'=> $password
			    ]

			]);

			$login_response = $this->decodeApiResponse($login_request);

			if (isset($login_response->data->token)) {

				$user_token = $login_response->data->token;
				$user_id = $login_response->data->user_id;
				$user_name = $login_response->data->user_name;

				session([
					'user_id'=> $user_id,
					'user_token'=> $user_token,
					'user_name'=> $user_name,
				]);

				return redirect()->route('home');

			}
			else {

				return view('login', ['login_failed'=> $login_response->data->login]);

			}

		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

	}

	public function showRegisterForm()
	{
		//
	}

	public function register(Request $request)
	{
		//
	}

	public function logout(Request $request)
	{
		if (!$request->session()->has('user_id'))
		{
			return redirect()->route('home');
		}

		$request->session()->forget('user_id');
		$request->session()->forget('user_token');
		$request->session()->forget('user_name');

		return back();
	}

}
