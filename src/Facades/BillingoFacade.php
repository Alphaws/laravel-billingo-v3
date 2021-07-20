<?php

namespace Alphaws\BillingoApiV3\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class BillingoApi
 * @package Alphaws\LaravelBillingoV3\Facades
 */
class BillingoFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'billingo';
    }
}
