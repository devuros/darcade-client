<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends ClientController
{

	public function __construct()
	{
		//
	}

	public function index()
	{
		//
	}

	public function showDeveloperGames($id)
	{

		try {

            $games_response = $this->getApiRequest('developers/'.$id.'/games');

            $games = $this->decodeApiResponse($games_response);

        }
        catch (\GuzzleHttp\Exception\ClientException $e) {

            return view('errors.api_request_failed');

        }
        catch (\Throwable $e) {

            return view('errors.api_not_available');

        }

        return view('games.show', compact('game'));

	}

}
