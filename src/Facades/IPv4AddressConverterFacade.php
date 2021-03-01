<?php

namespace Acamposm\IPv4AddressConverter\Facades;

use Illuminate\Support\Facades\Facade;

class IPv4AddressConverterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ipv4-address-converter';
    }
}
