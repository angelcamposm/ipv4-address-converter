<?php

namespace Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

final class GetAddressesFromHexadecimalStringTest extends BaseTestCase
{
    /**
     * @test
     */
    public function setHexadecimalAddressAndGetBinaryAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromHexadecimal(self::HEXADECIMAL_IPADDRESS)
            ->toBinary()
            ->get();

        $this->assertEquals(self::BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setHexadecimalAddressAndGetBinaryAddressWithDotNotation()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromHexadecimal(self::HEXADECIMAL_IPADDRESS)
            ->toBinary()
            ->withDotNotation()
            ->get();

        $this->assertEquals(self::DOTTED_BINARY_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setHexadecimalAddressAndGetDecimalAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromHexadecimal(self::HEXADECIMAL_IPADDRESS)
            ->toDecimal()
            ->get();

        $this->assertEquals(self::DECIMAL_IPADDRESS, $converter);
    }

    /**
     * @test
     */
    public function setHexadecimalAddressAndGetLongAddress()
    {
        $converter = IPv4AddressConverter::convert()
            ->fromHexadecimal(self::HEXADECIMAL_IPADDRESS)
            ->toLong()
            ->get();

        $this->assertEquals(self::LONG_IPADDRESS, $converter);
    }
}
