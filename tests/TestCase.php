<?php

namespace Acamposm\IPv4AddressConverter\Tests;

use Acamposm\IPv4AddressConverter\ServiceProviders\IPv4AddressConverterServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
    }

    protected function getPackageAliases($app)
    {
        return [
            'IPv4AddressConverter' => 'Acamposm\IPv4AddressConverter\Facades\IPv4AddressConverterFacade'
        ];
    }

    protected function getPackageProviders($app): array
    {
        return [
            IPv4AddressConverterServiceProvider::class,
        ];
    }
}