<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends ClientController
{
	public function index(Request $request)
	{
		if (!$request->session()->has('user_id'))
		{
			return redirect()->route('home');
		}

		try
		{
			$cart_response = $this->getApiRequest('cart', [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				]
			]);

			$cart_content = $this->decodeApiResponse($cart_response);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return view('cart.index', compact('cart_content'));
	}

	public function store(Request $request, $id)
	{
		if (!$request->session()->has('user_id'))
		{
			return redirect()->route('home');
		}

		try
		{
			$cart_request = $this->postApiRequest('cart', [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				],
				'form_params' => [
			        'game'=> $id
			    ]
			]);

			$cart_response = $this->decodeApiResponse($cart_request);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return redirect()->route('cart.index');
	}

	public function remove($id)
	{
		try
		{
			$cart_request = $this->deleteApiRequest('cart/'.$id, [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				]
			]);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return redirect()->route('cart.index');
	}

	public function empty()
	{
		try
		{
			$cart_request = $this->deleteApiRequest('cart', [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				]
			]);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return redirect()->route('cart.index');
	}

	public function checkout()
	{
		try
		{
			$cart_request = $this->postApiRequest('cart/checkout', [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				]
			]);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return redirect()
			->route('cart.index')
			->with('success', 'Your purchase was successful, enjoy!');
	}

	public function history()
	{
		try
		{
			$purchase_history_request = $this->getApiRequest('purchases', [
				'headers'=> [
					'Accept'=> 'application/json',
					'Authorization'=> 'Bearer '.session('user_token'),
					'X-Requested-With'=> 'XMLHttpRequest'
				]
			]);

			$purchase_history = $this->decodeApiResponse($purchase_history_request);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return view('cart.history', compact('purchase_history'));
	}

}
