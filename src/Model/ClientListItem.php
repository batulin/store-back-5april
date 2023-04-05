<?php

namespace App\Model;

class ClientListItem
{
    private int $id;
    private string $firstName;
    private string $secondName;
    private string $phone;
    private ?string $description;
    private string $status;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
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
    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


}