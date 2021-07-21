<?php
/**
 * This file is part of the Laravel Billingo Api package.
 *
 * LICENSE: This source file is subject to version 3.14 of the PrStart license
 * that is available through the world-wide-web at the following URI:
 * https://www.prstart.co.uk/license/  If you did not receive a copy of
 * the PrStart License and are unable to obtain it through the web, please
 * send a note to imre@prstart.co.uk so we can mail you a copy immediately.
 *
 * DESCRIPTION: Laravel Billingo Api
 *
 * @category   Laravel
 * @package    Laravel Billingo Api
 * @author     Imre Szeness <imre@prstart.co.uk>
 * @copyright  Copyright (c) 2021 PrStart Ltd. (https://www.prstart.co.uk)
 * @license    https://www.prstart.co.uk/license/ PrStart Ltd. License
 * @version    1.0.0 (02/02/2021)
 * @link       https://www.prstart.co.uk/laravel-development/billingo-api/
 * @since      File available since Release 1.0.0
 */

declare(strict_types=1);

namespace Alphaws\BillingoApiV3;

use Alphaws\BillingoApiV3\Exceptions\BadAuthenticationException;
use GuzzleHttp\Client as ApiClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

/**
 * Class BillingoApi
 * @package Alphaws\BillingoApiV3
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
        try {
            $response = $this->client->request($method, '/v3/' . $uri . '', [$data]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
            return $data;
        } catch (ClientException $e) {
            if ('401' == $e->getResponse()->getStatusCode()) {
                throw new BadAuthenticationException('Billingo Token is Invalid');
            }
            dump($e);
            die();
        }
    }
    /**
     * - partners
     * - products
     * - documents
     * - spendings
     * - bank-accounts
     * - currencies
     * -
     */

    /**
     * @param int $page
     * @param int $perPage
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPartners($page = 0, $perPage = 25)
    {
        $uri = 'partners?page=' . $page . '&per_page=' . $perPage;
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

    public function getProducts()
    {

    }

    public function getDocuments(
        $page = 1,
        $perPage = 25,
        $paymentMethod = 'cash',
        $paymentStatus = 'paid',
        $startDate = '2020-01-01',
        $endDate = '2021-12-31',
        $startNumber = 1,
        $endNumber = 1000000,
        $startYear = 2020,
        $endYear = 2021,
        $type='invoice',
        $paidStartDate = '2020-01-01',
        $paidEndDate = '2021-12-31',
        $fulfillmentStartDate = '2020-01-01',
        $fulfillmentEndDate = '2021-12-30'
    )
    {
        /**
         * page=1
         * per_page=25
         * payment_method=cash
         * payment_status=paid
         * start_date=2020-05-15
         * end_date=2020-05-15
         * start_number=1
         * end_number=10
         * start_year=2020
         * end_year=2020
         * type=invoice
         * paid_start_date=2020-05-15
         * paid_end_date=2020-05-15
         * fulfillment_start_date=2020-05-15
         * fulfillment_end_date=2020-05-15
         */
        $uri = "documents?page={$page}&per_page={$perPage}&" .
            "payment_method={$paymentMethod}&payment_status={$paymentStatus}&type={$type}";

      //  $uri = 'documents?'.
      //      'page=1'.
      //      '&per_page=25'
         //   '&payment_method=cash'
        //    '&payment_status=paid'
        //    '&start_date=2020-05-15'.
        //    '&end_date=2021-05-15'
        //    '&start_number=1'.
        //    '&end_number=10'.
        //    '&start_year=2020'.
        //    '&end_year=2020'.
        //    '&type=invoice'
        //    '&paid_start_date=2020-05-15'.
        //    '&paid_end_date=2020-05-15'
        //    '&fulfillment_start_date=2020-05-15'.
        //    '&fulfillment_end_date=2020-05-15'
        ;
        return $this->getData('GET', $uri);
    }
}
