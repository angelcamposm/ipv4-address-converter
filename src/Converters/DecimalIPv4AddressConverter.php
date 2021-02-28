<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\{
    Enums\IPAddressFormatEnum as IPAddressFormat,
    Traits\MutableIPv4AddressTrait as MutableIPv4Address,
};

class DecimalIPv4AddressConverter extends BaseAddressConverter
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
            IPAddressFormat::BINARY => $this->fromBinaryToDecimal($this->address),
            IPAddressFormat::DECIMAL => $this->fromDecimalToLong($this->address),
            IPAddressFormat::HEXADECIMAL => "//TODO: to be implemented",
            IPAddressFormat::LONG => $this->fromLongToDecimal($this->address),
            default => $this->address,
        };
    }
}