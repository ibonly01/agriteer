<?php

/*
 * This file is part of the Laravel etextmai, package.
 *
 * (c) Ibraheem Adeniyi <ibonly01@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ibonly\Agriteer;

use Illuminate\Support\ServiceProvider;

class EtextMailServiceProvider extends ServiceProvider
{
    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Publishes all the config file this package needs to function
    */
    public function boot()
    {
    }

    /**
    * Register the application services.
    */
    public function register()
    {
        $this->app->make('Ibonly\Agriteer\Agriteer');
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
        return ['laravel-etextmail'];
    }
}
