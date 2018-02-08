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

		$client = new Client;

		$genres_response = $client->request('GET', $this->getApiUrl().'genres');

		$genres = json_decode((string)$genres_response->getBody());

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
