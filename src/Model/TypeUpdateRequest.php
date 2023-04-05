<?php

namespace App\Model;

class TypeUpdateRequest
{
    #[NotBlank]
    private string $typeName;
    #[NotBlank]
    private string $slug;
    #[NotBlank]
    private int $typePrice;

    public function getTypeName(): string
    {
        return $this->typeName;
    }
    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

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

    public function getTypePrice(): int
    {
        return $this->typePrice;
    }

    public function setTypePrice(int $typePrice): self
    {
        $this->typePrice = $typePrice;

        return $this;
    }


}