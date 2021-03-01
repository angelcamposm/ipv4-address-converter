<?php

namespace Acamposm\IPv4AddressConverter\Traits;

trait MutableIPv4AddressTrait
{
    /**
     * Apply dot notation to IP Address.
     *
     * @param string $address
     * @param int $length
     * @return string
     */
    private function applyDotNotationToAddress(string $address, int $length): string
    {
        return implode('.', str_split($address, $length));
    }

    /**
     * Remove dot notation from binary string IP Address.
     *
     * @param string $address
     *
     * @return string
     */
    private function removeDotNotationToAddress(string $address): string
    {
        if (str_contains($address, '.')) {
            return str_replace('.', '', $address);
        }

        return $address;
    }

    /**
     * Converts a binary IP Address to dotted decimal IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromBinaryToDecimal(string $address): string
    {
        $address = $this->removeDotNotationToAddress($address);
        $octets = [];

        foreach (str_split($address, 8) as $octet) {
            $octets[] = bindec($octet);
        }

        return implode('.', $octets);
    }

    /**
     * Converts a binary IP Address to a hexadecimal IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromBinaryToHex(string $address): string
    {
        $address = $this->removeDotNotationToAddress($address);
        $octets = '';

        foreach (str_split($address, 8) as $octet) {
            $octets .= str_pad(dechex(bindec($octet)), 2, '0', STR_PAD_LEFT);
        }

        return strtoupper($octets);
    }

    /**
     * Converts a binary IP Address to dotted hexadecimal IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromBinaryToDottedHex(string $address): string
    {
        return $this->applyDotNotationToAddress($this->fromBinaryToHex($address), 2);
    }

    /**
     * Converts a binary IP Address to long integer IP Address.
     *
     * @param string $address
     * @return int
     */
    private function fromBinaryToLong(string $address): int
    {
        return $this->fromDecimalToLong($this->fromBinaryToDecimal($address));
    }

    /**
     * Converts a dotted decimal IP Address to binary IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromDecimalToBinary(string $address): string
    {
        $octets = '';

        foreach (explode('.', $address) as $octet) {
            $octets .= str_pad(decbin($octet), 8, '0', STR_PAD_LEFT);
        }

        return $octets;
    }

    /**
     * Converts a dotted decimal IP Address to doted binary IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromDecimalToDottedBinary(string $address): string
    {
        return $this->applyDotNotationToAddress($this->fromDecimalToBinary($address), 8);
    }

    /**
     * Converts a dotted decimal IP Address to dotted hex IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromDecimalToDottedHex(string $address): string
    {
        return $this->applyDotNotationToAddress($this->fromDecimalToHex($address), 2);
    }

    /**
     * Converts a dotted decimal IP Address to a hex IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromDecimalToHex(string $address): string
    {
        $octets = '';

        foreach (explode('.', $address) as $octet) {
            $octets .= str_pad(dechex($octet), 2, '0', STR_PAD_LEFT);
        }

        return strtoupper($octets);
    }

    /**
     * Converts a doted decimal IP Address to long integer IP Address.
     *
     * @param string $address
     * @return int
     */
    private function fromDecimalToLong(string $address): int
    {
        return ip2long($address);
    }


    /**
     * Converts a hexadecimal IP address to binary IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromHexadecimalToBinary(string $address): string
    {
        $octets = [];

        foreach (str_split($address, 2) as $octet) {
            $octets[] = str_pad(decbin(hexdec($octet)), 8, '0', STR_PAD_LEFT);
        }

        return implode('', $octets);
    }

    /**
     * Converts a hexadecimal IP address to binary IP Address with dot notation.
     *
     * @param string $address
     * @return string
     */
    private function fromHexadecimalToDottedBinary(string $address): string
    {
        return $this->applyDotNotationToAddress($this->fromHexadecimalToBinary($address), 8);
    }

    /**
     * Converts a hexadecimal IP address to decimal IP Address.
     *
     * @param string $address
     * @return string
     */
    private function fromHexadecimalToDecimal(string $address): string
    {
        $octets = [];

        foreach (str_split($address, 2) as $octet) {
            $octets[] = hexdec($octet);
        }

        return implode('.', $octets);
    }

    /**
     * Converts a hexadecimal IP address to Long integer IP Address.
     *
     * @param string $address
     * @return int
     */
    private function fromHexadecimalToLong(string $address): int
    {
        return ip2long($this->fromHexadecimalToDecimal($address));
    }

    /**
     * Converts a long integer IP Address to decimal IP Address.
     *
     * @param int $address
     * @return string
     */
    private function fromLongToDecimal(int $address): string
    {
        return long2ip($address);
    }

    /**
     * Converts a long integer IP Address to a dotted hex IP Address.
     *
     * @param int $address
     * @return string
     */
    private function fromLongToDottedHex(int $address): string
    {
        return $this->fromDecimalToDottedHex(long2ip($address));
    }

    /**
     * Converts a long integer IP Address to a hex IP Address.
     *
     * @param int $address
     * @return string
     */
    private function fromLongToHex(int $address): string
    {
        return $this->fromDecimalToHex(long2ip($address));
    }

    /**
     * Converts a long integer IP Address to binary IP Address.
     *
     * @param int $address
     * @return string
     */
    private function fromLongToBinary(int $address): string
    {
        return $this->fromDecimalToBinary($this->fromLongToDecimal($address));
    }

    /**
     * Converts a long integer IP Address to dotted binary IP Address.
     * @param string $address
     * @return string
     */
    private function fromLongToDottedBinary(string $address): string
    {
        return $this->fromDecimalToDottedBinary($this->fromLongToDecimal($address));
    }
}
