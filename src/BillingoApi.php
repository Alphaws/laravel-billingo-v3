<?php

namespace Alphaws\BillingoApiV3;

use Alphaws\BillingoApiV3\Services\BillingoService;
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
}
