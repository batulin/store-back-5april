<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints\NotBlank;

class TypeCreateRequest
{
    #[NotBlank]
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }



}