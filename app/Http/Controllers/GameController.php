<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends ClientController
{
    public function show($id)
    {
    	try
        {
            $game_response = $this->getApiRequest('games/'.$id);
            $game = $this->decodeApiResponse($game_response);

            $screenshots_response = $this->getApiRequest('games/'.$id.'/screenshots');
            $screenshots = $this->decodeApiResponse($screenshots_response);

            $reviews_request = $this->getApiRequest('games/'.$id.'/reviews');
            $reviews = $this->decodeApiResponse($reviews_request);

            $reviews_stats = $this->getApiRequest('games/'.$id.'/statistics');
            $statistics = $this->decodeApiResponse($reviews_stats);
        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('games.show', compact(['game', 'screenshots', 'reviews', 'statistics']));
    }

    public function wish($id)
    {
        //
    }

}
