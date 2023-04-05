<?php

namespace App\Exception;

class DeviceNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('device not found');
    }
}
