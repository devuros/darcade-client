<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends ClientController
{
	public function index()
	{
		try
		{
			$specials_limit = 3;

			$genres_response = $this->getApiRequest('genres/');
			$genres = $this->decodeApiResponse($genres_response);

			$specials_request = $this->getApiRequest('games/specials/sale/'.$specials_limit);
			$specials = $this->decodeApiResponse($specials_request);

			$under10_request = $this->getApiRequest('games/under/10/'.$specials_limit);
			$under10 = $this->decodeApiResponse($under10_request);

			$under25_request = $this->getApiRequest('games/under/25/'.$specials_limit);
			$under25 = $this->decodeApiResponse($under25_request);

			$featured_request = $this->getApiRequest('games/specials/featured');
			$featured = $this->decodeApiResponse($featured_request);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return view('home', compact(['genres', 'specials', 'under10', 'under25', 'featured']));
	}

	public function support()
	{
		return view('support');
	}

	public function contact(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$question = $request->question;
		$content = 'From: '.$name.'. Email:'.$email.'. Question: '.$question;

		Mail::send([], [], function ($content)
		{
			$content->to('uros.jovanovic.11.13@ict.edu.rs')
				->subject('Support');
		});

		return view('support', ['message'=> 'Your message was successfully sent']);
	}

	public function author()
	{
		return view('author');
	}

}
