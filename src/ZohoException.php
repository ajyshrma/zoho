<?php

namespace ajyshrma69\ZohoConnector;

use Exception;

class ZohoException extends Exception
{
    const ZOHO_CLIENT_ID_NOT_FOUND = "Please pass your client id to generate zoho code";

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
