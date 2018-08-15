<?php

namespace App\Services;

use GuzzleHttp\Client;

class SearchService
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * SearchService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Method used to connect to giphy api with the paramaters supplied
     * 
     * @param string $param
     * @param int $limit
     * @return mixed
     */
    public function query(string $param, int $limit)
    {
        return $this->requestDataFromEnpoint(
            'http://api.giphy.com/v1/gifs/search',
            [
                'query' => [
                    'api_key' => 'imxkWL8rhS5wzJuln9mNJbKVnVDv3VGw',
                    'q' => $param,
                    'limit' => $limit
                ]
            ]

        );
    }

    /**
     * Method uses the Guzzle client to perform a get request
     * 
     * @param string $uri
     * @param array $parameters
     * @return mixed
     */
    public function requestDataFromEnpoint(string $uri, array $parameters)
    {
        $request = $this->client->get($uri, $parameters);
        $data = json_decode((string) $request->getBody(), true);

        return $data;
    }
}
