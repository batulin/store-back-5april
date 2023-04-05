<?php

namespace App\Exception;

class TypeNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('type not found');
    }
}
