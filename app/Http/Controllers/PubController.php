<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PubController extends ClientController
{

    public function __construct()
	{
		//
	}

	public function index()
	{
		//
	}

	public function showPublisherGames($id)
	{

		try {

            $games_response = $this->getApiRequest('publishers/'.$id.'/games');

            $games = $this->decodeApiResponse($games_response);

        }
        catch (\GuzzleHttp\Exception\ClientException $e) {

            return view('errors.api_request_failed');

        }
        catch (\Throwable $e) {

            return view('errors.api_not_available');

        }

        return view('publishers.showPublisherGames', compact('games'));

	}

}
