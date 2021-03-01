<?php

namespace Acamposm\IPv4AddressConverter;

use Acamposm\IPv4AddressConverter\Converters\BinaryIPv4AddressConverter;
use Acamposm\IPv4AddressConverter\Converters\DecimalIPv4AddressConverter;
use Acamposm\IPv4AddressConverter\Converters\HexadecimalIPv4AddressConverter;
use Acamposm\IPv4AddressConverter\Converters\LongIPv4AddressConverter;
use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Interfaces\IPv4AddressConverterInterface;

class IPv4AddressConverter
{
    private int|string $address;
    private IPv4AddressConverterInterface $converter;
    private int $inputFormat;
    private bool $withDotNotation = false;

    /**
     * IPv4AddressConverter constructor.
     */
    public function __construct()
    {
        //
    }

    public static function convert()
    {
        return new static();
    }

    /**
     * Set the value of $address from a binary string IP Address.
     *
     * @param string $address
     *
     * @return $this
     */
    public function fromBinary(string $address): IPv4AddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::BINARY;

        return $this;
    }

    /**
     * Set the value of $address from a dotted decimal string IP Address.
     *
     * @param string $address
     *
     * @return $this
     */
    public function fromDecimal(string $address): IPv4AddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::DECIMAL;

        return $this;
    }

    /**
     * Set the value of $address from a hexadecimal string IP Address.
     *
     * @param string $address
     *
     * @return $this
     */
    public function fromHexadecimal(string $address): IPv4AddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::HEXADECIMAL;

        return $this;
    }

    /**
     * Set the value of $address from a long integer IP Address.
     *
     * @param int $address
     *
     * @return $this
     */
    public function fromLong(int $address): IPv4AddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::LONG;

        return $this;
    }

    /**
     * Set the output format as Binary string.
     *
     * @return IPv4AddressConverter
     */
    public function toBinary(): IPv4AddressConverter
    {
        $this->converter = new BinaryIPv4AddressConverter();

        return $this;
    }

    /**
     * Set the output format as Decimal string.
     *
     * @return IPv4AddressConverter
     */
    public function toDecimal(): IPv4AddressConverter
    {
        $this->converter = new DecimalIPv4AddressConverter();

        return $this;
    }

    /**
     * Set the output format as Hexadecimal string.
     *
     * @return IPv4AddressConverter
     */
    public function toHexadecimal(): IPv4AddressConverter
    {
        $this->converter = new HexadecimalIPv4AddressConverter();

        return $this;
    }

    /**
     * Set the output format as Long Integer.
     *
     * @return IPv4AddressConverter
     */
    public function toLong(): IPv4AddressConverter
    {
        $this->converter = new LongIPv4AddressConverter();

        return $this;
    }

    /**
     * Apply Dot notation to the output format.
     *
     * @return IPv4AddressConverter
     */
    public function withDotNotation(): IPv4AddressConverter
    {
        $this->withDotNotation = true;

        return $this;
    }

    /**
     * Returns the converted IP Address from the original value to specified format.
     *
     * @return int|string
     */
    public function get(): int|string
    {
        $converter = $this->converter;

        return match($this->inputFormat) {

            IPAddressFormat::BINARY => $this->withDotNotation
                ? $converter->fromBinary($this->address)->withDotNotation()->convert()
                : $converter->fromBinary($this->address)->convert(),

            IPAddressFormat::DECIMAL => $this->withDotNotation
                ? $converter->fromDecimal($this->address)->withDotNotation()->convert()
                : $converter->fromDecimal($this->address)->convert(),

            IPAddressFormat::HEXADECIMAL => $this->withDotNotation
                ? $converter->fromHexadecimal($this->address)->withDotNotation()->convert()
                : $converter->fromHexadecimal($this->address)->convert(),

            IPAddressFormat::LONG => $this->withDotNotation
                ? $converter->fromLong($this->address)->withDotNotation()->convert()
                : $converter->fromLong($this->address)->convert(),

            default => $this->address,
        };
    }
}
