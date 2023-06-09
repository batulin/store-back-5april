<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints\NotBlank;

class BrandCreateRequest
{
    #[NotBlank]
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }



}