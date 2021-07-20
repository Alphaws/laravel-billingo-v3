<?php

namespace Alphaws\BillingoApiV3\Services;

use Alphaws\BillingoApiV3\BillingoApi;
use GuzzleHttp\Client;
use Swagger\Client\Configuration;
use Swagger\Client\Model\Partner;

class BillingoService
{
    /** @var \Alphaws\BillingoApiV3\BillingoApi  */
    protected $client;

    /**
     * BillingoService constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $api = new BillingoApi($apiKey);
        $this->client = $api->getClient();
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
