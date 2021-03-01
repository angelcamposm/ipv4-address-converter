<?php

namespace Acamposm\IPv4AddressConverter\Converters;

use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Traits\MutableIPv4AddressTrait as MutableIPv4Address;

class LongIPv4AddressConverter extends BaseAddressConverter
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
            IPAddressFormat::BINARY => $this->fromBinaryToLong($this->address),
            IPAddressFormat::DECIMAL => $this->fromDecimalToLong($this->address),
            IPAddressFormat::HEXADECIMAL => $this->fromHexadecimalToLong($this->address),
            default => $this->address,
        };
    }
}
