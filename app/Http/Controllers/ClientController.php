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

    //

    protected $token_milos = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhkOTY3Njk2ODk5ZGNlOTk1OTExOGUxMDRmZjEyY2M4ODhiN2NmNDIyMTcyMGNiOTZkMzEzNTM5YzU0NzhkNWQzMGRmMjg1OTRiNzg0NTc5In0.eyJhdWQiOiIzIiwianRpIjoiOGQ5Njc2OTY4OTlkY2U5OTU5MTE4ZTEwNGZmMTJjYzg4OGI3Y2Y0MjIxNzIwY2I5NmQzMTM1MzljNTQ3OGQ1ZDMwZGYyODU5NGI3ODQ1NzkiLCJpYXQiOjE1MTg5NDU2MTcsIm5iZiI6MTUxODk0NTYxNywiZXhwIjoxNTUwNDgxNjE2LCJzdWIiOiI0MSIsInNjb3BlcyI6W119.dRMtFr7wvHDLxAszG1e3pVlhFLba5UrFqP8SnH1b8qgEBQYM_PAb6TqXXs4qaFcMJI32WqDJw7A9B3m0WLjFX8mo2xzScElBfOPotFhqYbJpbUWSeh-a_vrJJG8bNpkCdTBZkEm7pYudQYCxxti_Yix30CNGFO2A9I6-sj0VD0dBXQa3XM9EUk2dw8Nis3-o8rLvNjdngjNaI7N02WCKZruxLtDrj7fAsn_1VoiOhwGXeeRFNZ3V_PKsC7qfCXPGGRnK4ki4TjTiOq7J2FkwNQIjabEzUUF4SSiiDrV4aLgKoiiQ8G7qq7kutFgmEIONawdbrtLzR5as2jZYULPHUZ8BuDqBX55H25uCYUCdGWp4RelehVhbFg_EzwUOa3t8S00ugf4DA89tDLu5eJkB981KiPMjdz3qIN1CNHf3iqEOJZ-9JfjlpgSHjH8RMg3BJ1mmur_NtIU2mV4e8ftgn2gl3jfihh71MekQz8nXblyAwj1Gfz_L2lMhg8ovdXAwabVexkftWOwQJxIj2Trr4Bap7r5kfA6hm1E4VP3Q3sDa_SQyXqOYWoRu4n8VXCMgvlnbv6f4x5qGUfge_aUxBVctlwvv4EaIoPND-HhoafSO2EgU1UNE8hTZSJPAkmOK-vZB3_u0IP1LEp-o3yZ7gbrz1fOSyiehU5j6U1hnfFU';

    protected $token_uros = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUxZGQ0ZjdjMzUwY2UzNmE5NDc1MGU5MTA3YTUzMzI2NDFiZGQ5NWZhMTA2YTczMDZhNGIxZjlmNjExZDAxYmMzMjEyNmRjODBjNGQ1MzY0In0.eyJhdWQiOiIzIiwianRpIjoiNTFkZDRmN2MzNTBjZTM2YTk0NzUwZTkxMDdhNTMzMjY0MWJkZDk1ZmExMDZhNzMwNmE0YjFmOWY2MTFkMDFiYzMyMTI2ZGM4MGM0ZDUzNjQiLCJpYXQiOjE1MTkwNzI0NDAsIm5iZiI6MTUxOTA3MjQ0MCwiZXhwIjoxNTUwNjA4NDQwLCJzdWIiOiI0MiIsInNjb3BlcyI6W119.iqGg0068R47pM1eVFsKPEowpQlhmAydkP6cZCdDUn5gTZWD100RD5xX6rEOAn5Etd5l5XmmKey0GeajIu96NCejqrqF6nHNgcmZSehgldmYyLeWOTpEDc9_BLk14B0lnoXsHNRXYcfmxyicQSWPnp7xrkQy1jWqTSUOJhPpd4FF3u0adOayFl0FDgwZ_Ds8717iHNo8CHtXNYnZqTa1LuQZ3pbA5o3NmmcaVjUgeZ4LJzwERGOMUkSGMW_IoAqPC5igTPP3g5z6rF4XhGQtTU0vhTBHcm66IVt1oOwKlYY4718jF8v_-b9AX0O79xezGxoj2dgJB93OBLfnpFrumxtlrep3WrkIs8Uka86xmLUFGpLNEqt1_C0WQrs4o8na9bibBzzeRDnHRtUXx4vLSnvhR3BjJ1JSH4fAXkRHXfirEGZVNab_kOj0SoWfbucWasg6TFGF5LAWkc2DSTlS8StTdBZM2aOLARNRgpRQFhb0SjQaFlK54gVtNW7cxb5ojlpQ6fzMZzm0cQFOWoM6WpZ-MkO0imXHnRH_5cmQEv0OfpKOTBzQe8O00VDFcZpn66sxLh-zcrkoZcGNR4YowAcbAPPlW2JKFOXxisdIQEaCwEvvc13HLm9CZsB7N7t_T8uJ8L795lIUQA7oG1kIqSGIKhVV885R6zcKBw9eQx4g';

    public function getTokenMilos()
    {
        return $this->token_milos;
    }

    public function getTokenUros()
    {
        return $this->token_uros;
    }

}
