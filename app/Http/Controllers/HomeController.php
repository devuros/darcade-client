<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends ClientController
{
	public function index()
	{

		try {
			$specials_limit = 3;

			$genres_response = $this->getApiRequest('genres/');
			$genres = $this->decodeApiResponse($genres_response);

			$specials_request = $this->getApiRequest('games/specials/sale/'.$specials_limit);
			$specials = $this->decodeApiResponse($specials_request);

			$under10_request = $this->getApiRequest('games/under/10/'.$specials_limit);
			$under10 = $this->decodeApiResponse($under10_request);

			$under25_request = $this->getApiRequest('games/under/25/'.$specials_limit);
			$under25 = $this->decodeApiResponse($under25_request);

		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return view('home', compact(['genres', 'specials', 'under10', 'under25']));

	}

	public function support()
	{
		return view('support');
	}

	public function contact()
	{
		//
	}

	public function author()
	{
		return view('author');
	}

}
