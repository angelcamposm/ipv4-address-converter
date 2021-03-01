<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

final class GetAddressesFromBinaryStringTest extends BaseTestCase
{
    /**
     * @test
     */
    public function setBinaryAddressAndGetDecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromBinary(self::BINARY_IPADDRESS)
            ->toDecimal()
            ->get();

        $this->assertEquals(self::DECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setBinaryAddressAndGetHexadecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromBinary(self::BINARY_IPADDRESS)
            ->toHexadecimal()
            ->get();

        $this->assertEquals(self::HEXADECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setBinaryAddressAndGetHexadecimalAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromBinary(self::BINARY_IPADDRESS)
            ->toHexadecimal()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_HEXADECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setBinaryAddressAndGetLongAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromBinary(self::BINARY_IPADDRESS)
            ->toLong()
            ->get();

        $this->assertEquals(self::LONG_IPADDRESS, $converter);
    }
}
