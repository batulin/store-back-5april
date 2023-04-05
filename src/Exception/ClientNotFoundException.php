<?php

namespace App\Exception;

class ClientNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('client not found');
    }
}
