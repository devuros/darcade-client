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

    public function getRequestMethod()
    {
    	return $this->requestMethod;
    }

    public function setRequestMethod($requestMethod)
    {
    	$this->requestMethod = $requestMethod;
    	return $this;
    }

    public function apiRequest($uri, $options)
    {
    	$client = new Client;
    	return $client->request($this->getRequestMethod(), self::API_URL_LOCALHOST.$uri, $options);
    }

	public function getApiRequest($uri, array $options = [])
	{
		return $this->setRequestMethod(self::METHOD_GET)->apiRequest($uri, $options);
	}

	public function postApiRequest($uri, array $options = [])
	{
		return $this->setRequestMethod(self::METHOD_POST)->apiRequest($uri, $options);
	}

	public function putApiRequest($uri, array $options = [])
	{
		return $this->setRequestMethod(self::METHOD_PUT)->apiRequest($uri, $options);
	}

	public function deleteApiRequest($uri, array $options = [])
	{
		return $this->setRequestMethod(self::METHOD_DELETE)->apiRequest($uri, $options);
	}

	public function decodeApiResponse($apiResponse)
	{
		return json_decode((string)$apiResponse->getBody());
	}

}
