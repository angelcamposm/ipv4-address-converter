<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Traits\MutableIPv4AddressTrait as MutableIPv4Address;

class BinaryIPv4AddressConverter extends BaseAddressConverter
{
    use MutableIPv4Address;

    /**
     * Performs the conversion from the input format to Binary string.
     *
     * @return int|string
     */
    public function convert(): int|string
    {
        return match ($this->inputFormat) {
            IPAddressFormat::DECIMAL => $this->withDotNotation
                ? $this->fromDecimalToDottedBinary($this->address)
                : $this->fromDecimalToBinary($this->address),
            IPAddressFormat::HEXADECIMAL => $this->withDotNotation
                ? $this->fromHexadecimalToDottedBinary($this->address)
                : $this->fromHexadecimalToBinary($this->address),
            IPAddressFormat::LONG => $this->withDotNotation
                ? $this->fromLongToDottedBinary($this->address)
                : $this->fromLongToBinary($this->address),
            default => $this->address,
        };
    }
}
