<?php

namespace App\Model;

class TypeOfPlaceListItem
{
    private int $id;
    private string $typeName;
    private int $typePrice;
    private string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }
    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

        return $this;
    }
    public function getTypePrice(): int
    {
        return $this->typePrice;
    }
    public function setTypePrice(int $typePrice): self
    {
        $this->typePrice = $typePrice;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

}