<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints\NotBlank;

class DeviceCreateRequest
{

    #[NotBlank]
    private string $name;
    #[NotBlank]
    private int $price;
    #[NotBlank]
    private int $rating;

    #[NotBlank]
    private string $img;

    #[NotBlank]
    private int $typeId;

    #[NotBlank]
    private int $brandId;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }
    public function getTypeId(): int
    {
        return $this->typeId;
    }
    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }
    public function getBrandId(): int
    {
        return $this->brandId;
    }
    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }



}