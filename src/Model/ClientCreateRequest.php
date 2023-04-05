<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints\NotBlank;

class ClientCreateRequest
{
    #[NotBlank]
    private string $firstName;
    #[NotBlank]
    private string $secondName;
    #[NotBlank]
    private string $phone;
    private ?string $description = null;

    public function getFirstName(): string
    {
        return $this->firstName;
    }
        public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }
    public function getSecondName(): string
    {
        return $this->secondName;
    }
    public function setSecondName(string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

}