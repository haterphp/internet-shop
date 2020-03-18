<?php

namespace vendor\exceptions;

class CustomException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $exception = null)
    {
        parent::__construct($message, $code, $exception);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}

?>