<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientController extends Controller
{

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    const API_URL_LOCALHOST = 'http://localhost:8000/api/';
    const API_URL_LIVE = 'http://www.example.com/api/';

    protected $requestMethod;

    /**
     * Getter for request method
     */
    public function getRequestMethod()
    {

    	return $this->requestMethod;

    }

    /**
     * Setter for request method
     */
    public function setRequestMethod($requestMethod)
    {

    	$this->requestMethod = $requestMethod;
    	return $this;

    }

    /**
     * General method for all requests made to the api
     */
    public function apiRequest($uri, $options)
    {

    	$client = new Client;
    	return $client->request($this->getRequestMethod(), self::API_URL_LOCALHOST.$uri, $options);

    }

    /**
     * Method for making a get request
     */
	public function getApiRequest($uri, array $options = [])
	{

		return $this->setRequestMethod(self::METHOD_GET)->apiRequest($uri, $options);

	}

	/**
     * Method for making a post request
     */
	public function postApiRequest($uri, array $options = [])
	{

		return $this->setRequestMethod(self::METHOD_POST)->apiRequest($uri, $options);

	}

	/**
     * Method for making a put request
     */
	public function putApiRequest($uri, array $options = [])
	{

		return $this->setRequestMethod(self::METHOD_PUT)->apiRequest($uri, $options);

	}

	/**
     * Method for making a delete request
     */
	public function deleteApiRequest($uri, array $options = [])
	{

		return $this->setRequestMethod(self::METHOD_DELETE)->apiRequest($uri, $options);

	}

	/**
	 * Decode the json response from the api
	 */
	public function decodeApiResponse($apiResponse)
	{

		return json_decode((string)$apiResponse->getBody());

	}

}
