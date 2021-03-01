<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Interfaces\IPv4AddressConverterInterface;

abstract class BaseAddressConverter implements IPv4AddressConverterInterface
{
    protected int|string $address;
    protected int $inputFormat;

    /**
     * BaseAddressConverter constructor.
     *
     * @param false $withDotNotation
     */
    public function __construct(
        protected $withDotNotation = false,
    ) {
    }

    /**
     * Set the value of $address from Binary string.
     *
     * @param string $address
     *
     * @return BaseAddressConverter
     */
    public function fromBinary(string $address): BaseAddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::BINARY;

        return $this;
    }

    /**
     * Set the value of $address from Decimal string.
     *
     * @param string $address
     *
     * @return BaseAddressConverter
     */
    public function fromDecimal(string $address): BaseAddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::DECIMAL;

        return $this;
    }

    /**
     * Set the value of $address from Hexadecimal string.
     *
     * @param string $address
     *
     * @return BaseAddressConverter
     */
    public function fromHexadecimal(string $address): BaseAddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::HEXADECIMAL;

        return $this;
    }

    /**
     * Set the value of $address from Long Integer.
     *
     * @param int $address
     *
     * @return BaseAddressConverter
     */
    public function fromLong(int $address): BaseAddressConverter
    {
        $this->address = $address;
        $this->inputFormat = IPAddressFormat::LONG;

        return $this;
    }

    /**
     * Set the output format as dot notation.
     *
     * @return BaseAddressConverter
     */
    public function withDotNotation(): BaseAddressConverter
    {
        $this->withDotNotation = true;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function convert(): int|string
    {
    }
}
