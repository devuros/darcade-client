<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends ClientController
{
	public function showGenreGames($id)
	{
		try
		{
			$games_response = $this->getApiRequest('genres/'.$id.'/games');
			$games = $this->decodeApiResponse($games_response);
		}
		catch (\GuzzleHttp\Exception\ClientException $e)
		{
			return view('errors.api_request_failed');
		}
		catch (\Throwable $e)
		{
			return view('errors.api_not_available');
		}

		return view('genres.showGenreGames', compact('games'));
	}

}
