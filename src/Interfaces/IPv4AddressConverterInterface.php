<?php

namespace Acamposm\IPv4AddressConverter\Interfaces;

interface IPv4AddressConverterInterface
{
    /**
     * Returns a converted IPv4 address.
     *
     * @return int|string
     */
    public function convert(): int|string;
}
