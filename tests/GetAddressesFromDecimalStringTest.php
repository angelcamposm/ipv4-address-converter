<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

final class GetAddressesFromDecimalStringTest extends BaseTestCase
{
    /**
     * @test
     */
    public function setDecimalAddressAndGetBinaryAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromDecimal(self::DECIMAL_IPADDRESS)
            ->toBinary()
            ->get();

        $this->assertEquals(self::BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setDecimalAddressAndGetBinaryAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromDecimal(self::DECIMAL_IPADDRESS)
            ->toBinary()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setDecimalAddressAndGetHexadecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromDecimal(self::DECIMAL_IPADDRESS)
            ->toHexadecimal()
            ->get();

        $this->assertEquals(self::HEXADECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setDecimalAddressAndGetHexadecimalAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromDecimal(self::DECIMAL_IPADDRESS)
            ->toHexadecimal()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_HEXADECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setDecimalAddressAndGetLongAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromDecimal(self::DECIMAL_IPADDRESS)
            ->toLong()
            ->get();

        $this->assertEquals(self::LONG_IPADDRESS, $converter);
    }
}
