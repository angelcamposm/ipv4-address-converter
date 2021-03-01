<?php

namespace Acamposm\IPv4AddressConverter\ServiceProviders;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;
use Illuminate\Support\ServiceProvider;

class IPv4AddressConverterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->bind('ipv4-address-converter', function () {
            return new IPv4AddressConverter();
        });
    }
}
