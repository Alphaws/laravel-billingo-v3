<?php

namespace Alphaws\BillingoApiV3;

use Alphaws\BillingoApiV3\Services\BillingoService;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelBillingoServiceProvider
 * @package Alphaws\LaravelBillingoV3
 */
class LaravelBillingoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('billingo', function($app) {
            return new Billingo();
        });
    }

    public function provides()
    {
        //
    }

    public function boot()
    {
        //
    }
}
