<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\{
    Enums\IPAddressFormatEnum as IPAddressFormat,
    Traits\MutableIPv4AddressTrait as MutableIPv4Address
};

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
                ? implode('.', str_split($this->address, 2))
                : $this->address,
            IPAddressFormat::LONG => $this->withDotNotation
                ? $this->fromLongToDottedBinary($this->address)
                : $this->fromLongToBinary($this->address),
            default => $this->withDotNotation
                ? implode('.', str_split($this->address, 8))
                : $this->address,
        };
    }
}