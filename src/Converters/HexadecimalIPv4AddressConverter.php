<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Traits\MutableIPv4AddressTrait as MutableIPv4Address;

class HexadecimalIPv4AddressConverter extends BaseAddressConverter
{
    use MutableIPv4Address;

    /**
     * Performs the conversion from the input format to Hexadecimal string.
     *
     * @return int|string
     */
    public function convert(): int|string
    {
        return match ($this->inputFormat) {
            IPAddressFormat::BINARY => $this->withDotNotation
                ? $this->fromBinaryToDottedHex($this->address)
                : $this->fromBinaryToHex($this->address),
            IPAddressFormat::DECIMAL => $this->withDotNotation
                ? $this->fromDecimalToDottedHex($this->address)
                : $this->fromDecimalToHex($this->address),
            IPAddressFormat::LONG => $this->withDotNotation ?
                $this->fromLongToDottedHex($this->address) :
                $this->fromLongToHex($this->address),
            default => '',
        };
    }
}
