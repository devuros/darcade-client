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

            //
        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('games.show', compact(['game', 'screenshots']));
    }

}
