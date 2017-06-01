<?php

namespace Crosspay\exception;

use Exception;

class CrosspayException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getRawException()
    {
        return $this->getPrevious();
    }
}
