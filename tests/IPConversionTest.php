<?php

namespace Acamposm\IPv4AddressConverter\Tests;

use Acamposm\IPv4AddressConverter\IPv4AddressConverter;
use Acamposm\IPv4AddressConverter\ServiceProviders\IPv4AddressConverterServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class IPConversionTest extends OrchestraTestCase
{
    private const BINARY_IPADDRESS = '11000000101010000000101011111110';
    private const DOTTED_BINARY_IPADDRESS = '11000000.10101000.00001010.11111110';
    private const DECIMAL_IPADDRESS = '192.168.10.254';
    private const HEXADECIMAL_IPADDRESS = 'C0A80AFE';
    private const DOTTED_HEXADECIMAL_IPADDRESS = 'C0.A8.0A.FE';
    private const LONG_IPADDRESS = 3232238334;

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
