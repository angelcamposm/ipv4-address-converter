<?php

namespace Acamposm\IPv4AddressConverter\Facades;

use Illuminate\Support\Facades\Facade;

class SubnetCalculatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ipv4-address-converter';
    }
}