<?php

namespace Alphaws\BillingoApiV3\Facades;

use Alphaws\BillingoApiV3\Services\BillingoService;
use Illuminate\Support\Facades\Facade;

/**
 * Class BillingoApi
 * @package Alphaws\LaravelBillingoV3\Facades
 */
class BillingoApi extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'billingo-api';
    }
}
