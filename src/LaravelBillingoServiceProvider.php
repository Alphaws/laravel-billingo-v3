<?php

namespace Alphaws\BillingoApiV3;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelBillingoServiceProvider
 * @package Alphaws\LaravelBillingoV3
 */
class LaravelBillingoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->alias(Alphaws\LaravelIntervals\Repository::class, 'LaravelIntervals');

        $this->app->bind('billingo', function ($app) {
            return new Billingo;
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
