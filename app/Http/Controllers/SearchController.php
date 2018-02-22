<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends ClientController
{
    public function topSellers()
    {

        try {

            $specials_request = $this->getApiRequest('games/specials/top-sellers');
            $specials = $this->decodeApiResponse($specials_request);

        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('search.top_sellers', compact('specials'));

    }

    public function newReleases()
    {

        try {

            $specials_request = $this->getApiRequest('games/specials/new-releases');
            $specials = $this->decodeApiResponse($specials_request);

        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('search.new_releases', compact('specials'));

    }

    public function specials()
    {

        try {

            $specials_request = $this->getApiRequest('games/specials/sale');
            $specials = $this->decodeApiResponse($specials_request);

        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('search.specials', compact('specials'));

    }

    public function underTen()
    {

        try {

            $under10_request = $this->getApiRequest('games/under/10');
            $under10 = $this->decodeApiResponse($under10_request);

        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            return view('errors.api_request_failed');
        }
        catch (\Throwable $e)
        {
            return view('errors.api_not_available');
        }

        return view('search.under_ten', compact('under10'));

    }

    public function underTwentyFive()
    {

        try {

            $under25_request = $this->getApiRequest('games/under/25');
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

        return view('search.under_twenty_five', compact('under25'));

    }

}
