<?php

namespace App\Exception;

class BrandNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('brand not found');
    }
}
