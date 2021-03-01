<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

final class GetAddressesFromLongIntegerTest extends BaseTestCase
{
    /**
     * @test
     */
    public function setLongAddressAndGetBinaryAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromLong(self::LONG_IPADDRESS)
            ->toBinary()
            ->get();

        $this->assertEquals(self::BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setLongAddressAndGetBinaryAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromLong(self::LONG_IPADDRESS)
            ->toBinary()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setLongAddressAndGetDecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromLong(self::LONG_IPADDRESS)
            ->toDecimal()
            ->get();

        $this->assertEquals(self::DECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setLongAddressAndGetHexadecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromLong(self::LONG_IPADDRESS)
            ->toHexadecimal()
            ->get();

        $this->assertEquals(self::HEXADECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setLongAddressAndGetHexadecimalAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromLong(self::LONG_IPADDRESS)
            ->toHexadecimal()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_HEXADECIMAL_IPADDRESS, $converter);
    }
}
