<?php

namespace Acamposm\IPv4AddressConverter;

use Acamposm\IPv4AddressConverter\Converters\{
    BinaryIPv4AddressConverter,
    DecimalIPv4AddressConverter,
    HexadecimalIPv4AddressConverter,
    LongIPv4AddressConverter,
};
use Acamposm\IPv4AddressConverter\Enums\IPAddressFormatEnum as IPAddressFormat;
use Acamposm\IPv4AddressConverter\Exceptions\OutputFormatException;
use Acamposm\IPv4AddressConverter\Interfaces\IPv4AddressConverterInterface;
use stdClass;

class IPv4AddressConverter
{
    private int|string $address;
    private IPv4AddressConverterInterface $converter;
    private int $inputFormat;
    private bool $withDotNotation;

    /**
     * IPv4AddressConverter constructor.
     */
    public function __construct()
    {
        $this->withDotNotation = false;
    }

    /**
     * @return IPv4AddressConverter
     */
    public static function convert(): IPv4AddressConverter
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
        $this->converter = $this->getBinaryConverter();

        return $this;
    }

    /**
     * Set the output format as Decimal string.
     *
     * @return IPv4AddressConverter
     */
    public function toDecimal(): IPv4AddressConverter
    {
        $this->converter = $this->getDecimalConverter();

        return $this;
    }

    /**
     * Set the output format as Hexadecimal string.
     *
     * @return IPv4AddressConverter
     */
    public function toHexadecimal(): IPv4AddressConverter
    {
        $this->converter = $this->getHexadecimalConverter();

        return $this;
    }

    /**
     * Set the output format as Long Integer.
     *
     * @return IPv4AddressConverter
     */
    public function toLong(): IPv4AddressConverter
    {
        $this->converter = $this->getLongConverter();

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
     * @throws OutputFormatException
     */
    public function get(): int|string
    {
        if (!isset($this->converter)) {
            throw new OutputFormatException();
        }

        return match ($this->inputFormat) {
            IPAddressFormat::BINARY => $this->getFromBinary(),

            IPAddressFormat::DECIMAL => $this->getFromDecimal(),

            IPAddressFormat::HEXADECIMAL => $this->getFromHexadecimal(),

            IPAddressFormat::LONG => $this->getFromLong(),

            default => $this->address,
        };
    }

    /**
     * @return int|string
     */
    private function getFromBinary(): int|string
    {
        $converter = $this->converter->fromBinary($this->address);

        return $this->withDotNotation
            ? $converter->withDotNotation()->convert()
            : $converter->convert();
    }

    /**
     * @return int|string
     */
    private function getFromDecimal(): int|string
    {
        $converter = $this->converter->fromDecimal($this->address);

        return $this->withDotNotation
            ? $converter->withDotNotation()->convert()
            : $converter->convert();
    }

    /**
     * @return int|string
     */
    private function getFromHexadecimal(): int|string
    {
        $converter = $this->converter->fromHexadecimal($this->address);

        return $this->withDotNotation
            ? $converter->withDotNotation()->convert()
            : $converter->convert();
    }

    /**
     * @return int|string
     */
    private function getFromLong(): int|string
    {
        $converter = $this->converter->fromLong($this->address);

        return $this->withDotNotation
            ? $converter->withDotNotation()->convert()
            : $converter->convert();
    }

    /**
     * Returns an object with all address conversions.
     *
     * @return object
     */
    public function all(): object
    {
        return match ($this->inputFormat) {
            IPAddressFormat::BINARY => $this->getOutputFromBinaryAddress(),

            IPAddressFormat::DECIMAL => $this->getOutputFromDecimalAddress(),

            IPAddressFormat::HEXADECIMAL => $this->getOutputFromHexadecimalAddress(),

            IPAddressFormat::LONG => $this->getOutputFromLongAddress(),

            default => $this->address,
        };
    }

    /**
     * Returns a BinaryIPv4AddressConverter instance.
     *
     * @return IPv4AddressConverterInterface
     */
    private function getBinaryConverter(): IPv4AddressConverterInterface
    {
        return new BinaryIPv4AddressConverter();
    }

    /**
     * Returns a DecimalIPv4AddressConverter instance.
     *
     * @return IPv4AddressConverterInterface
     */
    private function getDecimalConverter(): IPv4AddressConverterInterface
    {
        return new DecimalIPv4AddressConverter();
    }

    /**
     * Returns a HexadecimalIPv4AddressConverter instance.
     *
     * @return IPv4AddressConverterInterface
     */
    private function getHexadecimalConverter(): IPv4AddressConverterInterface
    {
        return new HexadecimalIPv4AddressConverter();
    }

    /**
     * Returns a LongIPv4AddressConverter instance.
     *
     * @return IPv4AddressConverterInterface
     */
    private function getLongConverter(): IPv4AddressConverterInterface
    {
        return new LongIPv4AddressConverter();
    }

    /**
     * Returns an object with all converter instances.
     *
     * @return object
     */
    private function getAddressConverters(): stdClass
    {
        return (object) [
            'binary' => $this->withDotNotation
                ? $this->getBinaryConverter()->withDotNotation()
                : $this->getHexadecimalConverter(),
            'decimal' => $this->getDecimalConverter(),
            'hexadecimal' => $this->withDotNotation
                ? $this->getHexadecimalConverter()->withDotNotation()
                : $this->getHexadecimalConverter(),
            'long' => $this->getLongConverter(),
        ];
    }

    /**
     * Returns an object with all address conversions from binary address.
     *
     * @return stdClass
     */
    private function getOutputFromBinaryAddress(): stdClass
    {
        $address = $this->address;
        $converters = $this->getAddressConverters();

        return (object) [
            'binary' => $address,
            'decimal' => $converters->decimal->fromBinary($address)->convert(),
            'hexadecimal' => $converters->hexadecimal->fromBinary($address)->convert(),
            'long' => $converters->long->fromBinary($address)->convert(),
        ];
    }

    /**
     * Returns an object with all address conversions from decimal address.
     *
     * @return stdClass
     */
    private function getOutputFromDecimalAddress(): stdClass
    {
        $address = $this->address;
        $converters = $this->getAddressConverters();

        return (object) [
            'binary' => $converters->binary->fromDecimal($address)->convert(),
            'decimal' => $address,
            'hexadecimal' => $converters->hexadecimal->fromDecimal($address)->convert(),
            'long' => $converters->long->fromDecimal($address)->convert(),
        ];
    }

    /**
     * Returns an object with all address conversions from hexadecimal address.
     *
     * @return object
     */
    private function getOutputFromHexadecimalAddress(): stdClass
    {
        $address = $this->address;
        $converters = $this->getAddressConverters();

        return (object) [
            'binary' => $converters->binary->fromHexadecimal($address)->convert(),
            'decimal' => $converters->decimal->fromHexadecimal($address)->convert(),
            'hexadecimal' => $address,
            'long' => $converters->long->fromHexadecimal($address)->convert(),
        ];
    }

    /**
     * Returns an object with all address conversions from long address.
     *
     * @return object
     */
    private function getOutputFromLongAddress(): stdClass
    {
        $address = $this->address;
        $converters = $this->getAddressConverters();

        return (object) [
            'binary' => $converters->binary->fromLong($address)->convert(),
            'decimal' => $converters->decimal->fromLong($address)->convert(),
            'hexadecimal' => $converters->hexadecimal->fromLong($address)->convert(),
            'long' => $address,
        ];
    }
}
