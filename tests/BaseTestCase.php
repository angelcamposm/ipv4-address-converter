<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\ServiceProviders\IPv4AddressConverterServiceProvider;
use Orchestra\Testbench\TestCase;

class BaseTestCase extends TestCase
{
    protected const BINARY_IPADDRESS = '11000000101010000000101011111110';
    protected const DOTTED_BINARY_IPADDRESS = '11000000.10101000.00001010.11111110';
    protected const DECIMAL_IPADDRESS = '192.168.10.254';
    protected const HEXADECIMAL_IPADDRESS = 'C0A80AFE';
    protected const DOTTED_HEXADECIMAL_IPADDRESS = 'C0.A8.0A.FE';
    protected const LONG_IPADDRESS = 3232238334;

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
