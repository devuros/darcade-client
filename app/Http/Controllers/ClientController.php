<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientController extends Controller
{

    // protected $client;

    // public function __construct(Client $client)
    // {

    // 	$this->client = $client;

    // }

    protected $apiUrl = 'http://localhost:8000/api/';

    public function getApiUrl()
    {

    	return $this->apiUrl;

    }

}
