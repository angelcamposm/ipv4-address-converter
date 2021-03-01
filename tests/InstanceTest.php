<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;
use Acamposm\IPv4AddressConverter\ServiceProviders\IPv4AddressConverterServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class InstanceTest extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
    }

    protected function getPackageProviders($app): array
    {
        return [
            IPv4AddressConverterServiceProvider::class,
        ];
    }

    /**
     * @test
     */
    public function checkInstanceFromFacade()
    {
        $instance = new IPv4AddressConverter();

        self::assertInstanceOf('Acamposm\IPv4AddressConverter\IPv4AddressConverter', $instance);
    }
}
