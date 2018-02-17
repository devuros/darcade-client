<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends ClientController
{

	public function __construct()
	{
		//
	}

	public function index()
	{

		try {

			$genres_response = $this->getApiRequest('genres');

			$genres = $this->decodeApiResponse($genres_response);

		}
		catch (\GuzzleHttp\Exception\ClientException $e) {

			return view('errors.api_request_failed');

		}
		catch (\Throwable $e) {

			return view('errors.api_not_available');

		}

		return view('home', compact('genres'));

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
