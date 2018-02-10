<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends ClientController
{

	public function __construct()
	{
		//
	}

	public function index()
	{

		$genres_response = $this->getApiRequest('genres');

		$genres = $this->decodeApiResponse($genres_response);

		return view('home', compact('genres'));

	}

	public function about()
	{

		//

	}

	public function support()
	{

		//

	}

	public function author()
	{

		//

	}

}
