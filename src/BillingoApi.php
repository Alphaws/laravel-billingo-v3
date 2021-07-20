<?php

namespace Alphaws\BillingoApiV3;

use GuzzleHttp\Client as ApiClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

/**
 * Class BillingoApi
 * @package Alphaws\BillingoApiV3
 *
 * @todo: old : Client.php
 *
 */
class BillingoApi
{
    protected $host = 'https://api.billingo.hu';
    protected $client;

    /**
     * BillingoApi constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->client = new ApiClient(
            [
                'base_uri' => $this->host,
                RequestOptions::HEADERS => [
                    'accept' => 'application/json',
                    'X-API-KEY' => $apiKey,
                    'debug' => true,
                ],
                'defaults' => [
                    RequestOptions::DEBUG => true,
                    RequestOptions::CONNECT_TIMEOUT => 5,
                    RequestOptions::ALLOW_REDIRECTS => true,
                ],
                RequestOptions::VERIFY => true,
                RequestOptions::EXPECT => false,
            ]
        );
    }

    /**
     * Retrieve Billingo Client
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient(): ApiClient
    {
        return $this->client;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param null $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getData(string $method, string $uri, $data = null)
    {
        $res = $this->client->request($method, '/v3/' . $uri);
        return json_decode($res->getBody()->getContents(), true);
    }


    public function getPartners($page = 0, $perPage = 10)
    {
        $uri = 'partners';
        return $this->getData('GET', $uri);
    }

    public function getPartner($id)
    {
        //
    }

    public function createPartner()
    {
        //
    }

    public function deletePartner()
    {
        //
    }
}
