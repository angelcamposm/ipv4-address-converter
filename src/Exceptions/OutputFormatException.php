<?php

namespace Acamposm\IPv4AddressConverter\Exceptions;

use Exception;

class OutputFormatException extends Exception
{
    /**
     * OutputFormatException constructor.
     *
     * @param string $message
     */
    public function __construct($message = 'Output format not specified.')
    {
        parent::__construct($message);
    }
}