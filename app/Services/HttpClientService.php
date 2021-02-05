<?php


namespace App\Services;


use GuzzleHttp\Client;

class HttpClientService
{
    protected $httpClient;

    public function __construct(Client $client)
    {
        $this->httpClient = $client;
    }
}
