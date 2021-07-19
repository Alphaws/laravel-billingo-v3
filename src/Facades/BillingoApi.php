<?php

namespace Alphaws\BillingoApiV3\Facades;

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
