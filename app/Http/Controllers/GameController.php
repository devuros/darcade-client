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

    public function wish(Request $request, $id)
    {
        if (!$request->session()->has('user_id'))
        {
            return redirect()->route('home');
        }

        try
        {
            $store_wish_request = $this->postApiRequest('wishes', [
                'headers'=> [
                    'Accept'=> 'application/json',
                    'Authorization'=> 'Bearer '.session('user_token'),
                    'X-Requested-With'=> 'XMLHttpRequest'
                ],
                'form_params' => [
                    'game'=> $id
                ]
            ]);
            $wish = $this->decodeApiResponse($store_wish_request);
        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return redirect()
            ->route('users.wishes', ['id'=> session('user_id')])
            ->with('success', $wish->message);
    }

}
